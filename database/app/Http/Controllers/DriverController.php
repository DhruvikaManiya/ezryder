<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function rental_home()
    {
        return view('mobile.rental-driver.rental-home');
    }

    public function ride_details()
    {
        return view('mobile.rental-driver.ride-details');
    }

    public function verify_otp()
    {
        return view('mobile.rental-driver.verify-otp');
    }
}
