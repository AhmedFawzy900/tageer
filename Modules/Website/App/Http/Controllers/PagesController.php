<?php

namespace Modules\Website\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id,$slug)
    {
        $page = \App\Models\Page::findOrFail($id);
        return view('website::page')->with([
            'page' => $page
        ]);
    }

    public function blog()
    {
        $suggested_cars = \App\Models\Car::whereIn("id", \App\Models\BlogCar::pluck("car_id")->toArray())
        ->whereHas('company', function($q) {
            $q->where('country_id', app('country')->getCountry()->id);
            if(app('country')->getCity()) {
                $q->whereHas('cities', function($qq) {
                    $qq->where('city_id', app('country')->getCity()->id);
                });
            }
        })->get();
        $blogs = \App\Models\Blog::orderBy("id","desc")->paginate(5);
        return view('website::blog',[
            'suggested_cars' => $suggested_cars,
            'blogs' => $blogs
        ]);
    }

    public function faq()
    {
        return view('website::faq');
    }

    public function contact() {
        return view('website::contact');
    }

    public function saveContact(Request $request) {
        $data = $request->all();
        \App\Models\Message::create($data);
        return redirect()->back()->with('success', 'Message sent successfully');
    }

    public function listYourCar() {
        return view('website::list-your-car');
    }


}
