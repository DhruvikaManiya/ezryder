<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function logout()
    {
        if (Auth::user()->type == 1) {
            Auth::logout(); // logout admin
            return redirect()->route('admin.login');
        } elseif (Auth::user()->type == 2) {
            Auth::logout(); // logout vendor
            return redirect()->route('mobile.vendor.login');
        } elseif (Auth::user()->type == 3) {
            Auth::logout(); // logout delivery
            return redirect()->route('mobile.delivery.login');
        } elseif (Auth::user()->type == 4) {
            Auth::logout(); //logout rider
            return redirect()->route('mobile.rider.login');
        }
    }
}
