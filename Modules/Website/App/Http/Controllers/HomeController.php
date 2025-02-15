<?php

namespace Modules\Website\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \App\Models\Type;
use \App\Models\Section;
use \App\Models\Company;
use \App\Models\Banner;

class HomeController extends Controller
{

    public function reviews() {
        // render and pass data to view
        $gr = view('website::layouts.parts.gr',['src' => app('settings')->get('google_reviews_widget') ])->render();
        $fb = view('website::layouts.parts.fb',['src' => app('settings')->get('facebook_reviews_widget') ])->render();
        
        return response()->json([
            'gr' => $gr,
            'fb' => $fb
        ]);
    }
    public function index()
    {
        $types = Type::withCount('cars')
        ->orderBy('cars_count', 'desc')
        ->get();
        $sections = Section::orderBy('sort', 'asc')->get();
        $companies = Company::with("types")->where(function($query) {
            $query->where('type','default');
            $query->where('country_id', app('country')->getCountry()->id);
            if(app('country')->getCity()) {
                $query->whereHas('cities', function($qq) {
                    $qq->where('city_id', app('country')->getCity()->id);
                });
            }
        })->limit(10)->inRandomOrder()->get();
        $banners   = Banner::orderBy('id', 'desc')->get();
        return view('website::index')->with([
            'types' => $types,
            'sections' => $sections,
            'companies' => $companies,
            'banners' => $banners
        ]);
    }

    public function switchLanguage($key) {
    
        \Cookie::queue(\Cookie::make('locale', $key, 60*24*30));
        return redirect()->back();
    }

    public function switchCountry($id) {
        \Cookie::queue('country_id', $id, 60* 24 * 30);
        \Cookie::queue('city_id', 0, 60* 24 * 30);
        return redirect()->back();
    }
    
    public function switchCity($id) {
        $city = \App\Models\City::find($id);
        \Cookie::queue('city_id', $id, 60* 24 * 30);
        if($city) {
            \Cookie::queue('country_id', $city->country_id, 60* 24 * 30);
        }
        if($id == 0) {
            return redirect("/");
        }
        
        return redirect("/l/" . $city->id . "/" . $city->slug());
    }

    public function switchCurrency($id) {
        \Cookie::queue('currency_id', $id, 60* 24 * 30);
        return redirect()->back();
    }

}
