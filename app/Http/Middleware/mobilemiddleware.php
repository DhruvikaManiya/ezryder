<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class mobilemiddleware
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
            if (Auth::user()->type != 0) {
                Auth::logout();
            }
        }

        if($request->route()->getName() == 'mobile.home')
        {
            return $next($request);
        }


        $url = [
            'mobile.login',
            'mobile.register',
            'mobile.registerStore',
            'mobile.login_check',
            'mobile.forgotPassword',
            'mobile.otpverify',
            'mobile.postEmail',
            'mobile.verifyotp',
            'mobile.passwordupdate',
        ];

        // dd(!Auth::check());

        if (!Auth::check() && in_array($request->route()->getName(), $url)) {

            return $next($request);
        }
        if (Auth::check() && Auth::user()->type == 0) {
            // dd('rider');
            if (!in_array($request->route()->getName(), $url)) {

                return $next($request);
            } else {

                return redirect()->route('mobile.grocery');
            }
        }

        if ($request->route()->getName() != 'mobile.login') {

            return redirect()->route('mobile.login');
        }
        return $next($request);
    }
}
