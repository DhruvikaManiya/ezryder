<?php

namespace App\Http\Controllers;

use App\brand;
use App\Cart;
use App\Category;
use App\Order;
use App\Ordered_product;
use App\Order_addres;
use App\Payment;
use App\product;
use App\Reset_password;
use App\Review;
use App\Slider;
use App\User;
use App\Wishlist;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Notificaation;
use App\Store;
use Illuminate\Support\Facades\DB;
// use Stevebauman\Location\Facades\Location;

class UserAppController extends Controller
{
    // register
    public function test()
    {
        return view('user_app.products.test');
        
    }

    public function home($slug)
    {
        // echo $slug;
        return view('user_app.products.home');
        
    }

   
}
