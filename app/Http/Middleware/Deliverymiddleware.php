<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Deliverymiddleware
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
            if (Auth::user()->type != 3) {
                Auth::logout(); 
            }
        }


        $url = [
            'mobile.delivery.login',
            'mobile.delivery.register',
            'mobile.delivery.registerStore',
            'mobile.delivery.loginCheck',
            'mobile.delivery.forgotPassword',
            'mobile.delivery.otpverify',
            'mobile.delivery.postEmail',
            'mobile.delivery.verifyotp',
            'mobile.delivery.passwordupdate',
        ];


      

        if (!Auth::check() && in_array($request->route()->getName(), $url)) {

            return $next($request);
        }
        if (Auth::check() && Auth::user()->type == 3) {
            if (!in_array($request->route()->getName(), $url)) {
                return $next($request);
            } else {

                return redirect()->route('mobile.delivery.order');
            }
        }

        if ($request->route()->getName() != 'mobile.delivery.login') {

            return redirect()->route('mobile.delivery.login');
        }
        return $next($request);
    }
}
