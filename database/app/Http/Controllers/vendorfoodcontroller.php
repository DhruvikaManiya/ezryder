<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class vendorfoodcontroller extends Controller
{
    public function login()
    {
        return view('mobile.vendor-food.login');
    }

    public function register()
    {
        return view('mobile.vendor-food.register');
    }

    public function home()
    {
        return view('mobile.vendor-food.home');
    }
    // analytics
    public function analytics()
    {
        return view('mobile.vendor-food.analytics');
    }
    // account
    public function account()
    {
        return view('mobile.vendor-food.account');
    }
    // products
    public function addproducts()
    {
        return view('mobile.vendor-food.addproducts');
    }
    public function products()
    {
        return view('mobile.vendor-food.products');
    }
    public function wallet()
    {
        return view('mobile.vendor-food.wallet');
    }
    public function bankdetail()
    {
        return view('mobile.vendor-food.bankdetail');
    }

    public function review()
    {
        return view('mobile.vendor-food.review');
    }

    public function orders()
    {
        return view('mobile.vendor-food.orders');
    }
    public function order_detail()
    {
        return view('mobile.vendor-food.order-detail');
    }
}
