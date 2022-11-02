<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class vendormiddleware
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
            if (Auth::user()->type != 2) {
                Auth::logout(); 
            }
        }

        $url = [
            'vendor.login',
            'vendor.register',
            'vendor.registerStore',
            'vendor.login_check',
            'vendor.forgotpassword',
            'vendor.otpverify',
            'vendor.postEmail',
            'vendor.verifyotp',
            'vendor.passwordupdate',
        ];

        if (!Auth::check() && in_array($request->route()->getName(), $url)) {

            return $next($request);
        }

        if (Auth::check() && Auth::user()->type == 2) {

            if (!in_array($request->route()->getName(), $url)) {
                return $next($request);
            } else {

                return redirect()->route('vendor.dashboard');
            }
        }

        if ($request->route()->getName() != 'vendor.login') {

            return redirect()->route('vendor.login');
        }

        return $next($request);
    }
}
