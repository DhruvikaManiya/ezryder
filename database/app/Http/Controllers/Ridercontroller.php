<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Ridercontroller extends Controller
{
    public function login()
    {
        return view('mobile.rider.login');
    }
    public function book_now()
    {
        return view('mobile.rider.book-now');
    }
    public function otp()
    {
        return view('mobile.rider.otp');
    }
    public function driver_mybooking()
    {
        return view('mobile.rider.accepting_3');
    }
    public function home()
    {
        return view('mobile.rider.home');
    }
    public function pickup()
    {
        return view('mobile.rider.pickup');
    }
    public function drop()
    {
        return view('mobile.rider.drop');
    }
    public function collect()
    {
        return view('mobile.rider.collect');
    }
    public function collect2()
    {
        return view('mobile.rider.collect2');
    }

    public function rider()
    {
        return view('mobile.rider.home');
    }

    public function homenow()
    {
        return view('mobile.rider.home-now');
    }

    public function payment()
    {
        return view('mobile.rider.rider-payment');
    }

    public function my_booking()
    {
        return view('mobile.rider.my-booking');
    }

    public function booking_details()
    {
        return view('mobile.rider.rider-booking-details');
    }
    // account
    public function account()
    {
        return view('mobile.rider.account');
    }

    public function profile()
    {
        return view('mobile.rider.profile');
    }

    public function wallet()
    {
        return view('mobile.rider.wallet');
    }

    public function document()
    {
        return view('mobile.rider.document');
    }

    public function vehicle()
    {
        return view('mobile.rider.vehicle');
    }

    public function register()
    {
        return view('mobile.rider.register');
    }

    // direction
    public function direction()
    {
        return view('mobile.rider.direction');
    }
}
