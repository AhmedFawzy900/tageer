<?php

namespace Modules\Website\App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Language
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {


        if(\Cookie::get('locale')) {
            app()->setLocale(\Cookie::get('locale'));
        }else {
            app()->setLocale('en');
        }
        // dd(app()->getLocale());

        if(auth()->guard('customers')->check()) {
            if(!auth()->guard('customers')->user()->is_phone_verified 
            && \Route::currentRouteName() != 'verify' && \Route::currentRouteName() != 'phone'
            && \Route::currentRouteName() != 'logout'
            ) {
                return redirect("/account/phone");
            }
        }

        \App\Models\View::create([
            'car_id' =>null,
            'company_id' => null,
            'user_id' => null
        ]);
        
        return $next($request);
    }
}
