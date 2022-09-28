<?php

namespace App\Http\Controllers;

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
            return view('admin.login');
        } elseif (Auth::user()->type == '3') {
            Auth::logout(); // logout user
            return view('mobile.delivery.login');
        } else {
            Auth::logout(); // logout user
            return redirect('error');
        }
    }
}
