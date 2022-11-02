<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Adminmiddleware
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
        if(Auth::check())
        {
            if(Auth::user()->type == 1)
            {
                return $next($request);
            }
            else
            {
               
                return redirect()->route('admin.login');
            }
        }
        else
        {
            return redirect()->route('admin.login');
        }
        return $next($request);
    }
}