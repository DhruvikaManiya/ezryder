<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Ridermiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (!Auth::user()->type == 4) {
                Auth::logout();
            }
        }


        $url = [
            'mobile.rider.login',
            'mobile.rider.register',
            'mobile.rider.registerStore',
            'mobile.rider.loginCheck',
        ];

        if (!Auth::check() && in_array($request->route()->getName(), $url)) {

            return $next($request);
        }
        if (Auth::check() && Auth::user()->type == 4) {
            // dd('rider');
            if (!in_array($request->route()->getName(), $url)) {
                return $next($request);
            } else {

                return redirect()->route('mobile.rider.account');
            }
        }

        if ($request->route()->getName() != 'mobile.rider.login') {

            return redirect()->route('mobile.rider.login');
        }
        return $next($request);
    }
}
