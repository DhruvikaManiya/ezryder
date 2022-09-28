<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodDeliveryController extends Controller
{
    public function login()
    {
        return view('mobile.food-delivery.login');
    }
    public function register()
    {
        return view('mobile.food-delivery.register');
    }
    // home
    public function home()
    {
        return view('mobile.food-delivery.home');
    }
    public function history()
    {
        return view('mobile.food-delivery.history');
    }

    public function order_detail()
    {
        return view('mobile.food-delivery.order-detail');
    }
    public function account()
    {
        return view('mobile.food-delivery.account');
    }
    // wallet
    public function wallet()
    {
        return view('mobile.food-delivery.wallet');
    }
    // bankdetail
    public function bankdetail()
    {
        return view('mobile.food-delivery.bankdetail');
    }
}
