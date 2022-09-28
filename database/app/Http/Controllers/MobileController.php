<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Category;
use App\Subcategory;
use App\product;
use App\brand;
use App\Cart;
use App\Order;
use App\Order_addres;
use App\Payment;

class MobileController extends Controller
{
    // register
    public function register()
    {
        return view('mobile.grocery.register');
    }
    public function register_store(request $request)
    {
        
        // $request->validate([
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:8',
        //     'store_type' => 'required',

        // ]);
        $data=new User();
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->email=$request->email;
        $data->password=Hash::make($request->password);
        $data->store_type=$request->store_type;
        $data->save();
        // dd($data);
        return redirect()->route('mobile.login');
       
       
    }
    public function logout()
     {
        Session::flush();
        Auth::logout();
        return Redirect()->route('mobile.login');
    }

    public function home()
    {
        return view('mobile.home');
    }
    // login
    public function login()
    {
        return view('mobile.grocery.login');
    }
    public function login_check(Request $request)
    {
        $user = User::where("email",$request->email)->first();
        if($user)
        {
            
        //     if(Hash::check($request->password , $user->password))
        //     {
        // dd($user);

                Auth::login($user);
                return redirect()->route('mobile.grocery');
            // }
        }
        else{
            return redirect()->route('mobile.login');
        }
    }
    // grocery
    public function grocery()
    {
        $category=Category::all();
        $Product=product::all();
        $brand=brand::all();
        return view('mobile.grocery.grocery',compact('category','Product','brand'));
    }
    // product list
    public function productList()
    {
        // $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('mobile.grocery.productlist',compact('subcategories'));
    }
    //categoriesList
    public function categoriesList()
    {
        return view('mobile.grocery.categorieslist');
    }
    // cart
    public function cart()
    {

        $carts = Cart::where('user_id',Auth::user()->id)->get();
        return view('mobile.grocery.cart',compact('carts'));
    }
    // order
    public function order(Request $request )
    {
      $orders = Order::where('user_id',Auth::user()->id)->where('status',0)->get();
        
        foreach($orders as $order)
        {
            $order->status = 1;
            $order->save();
        }
        $order_list = Order::where('user_id',Auth::user()->id)->where('status','!=', 0)->get();
        return view('mobile.grocery.order',compact('order_list'));
    }
    //product details
    public function productDetails()
    {
        return view('mobile.grocery.productdetails');
    }
    // checkout
    public function checkout()
    {
        return view('mobile.grocery.checkout');
    }
   
    // category
    public function category()
    {
        return view('mobile.grocery.category');
    }
    //orderAddress
    public function orderAddress(Request $request)
    {
        
       
        $order_address=new Order_addres();
       
        $cars = Cart::where('user_id',Auth::user()->id)->get();
        
        foreach($cars as $car)
        {
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->product_id = $car->product_id;
            $order->quantity = $car->quantity;
            $order->vendor_id=$car->product->user_id;
            $order->status = 0;

            $order->save();

            $order_address=new Order_addres();
            $order_address->order_id=$order->id;
            $order_address->user_id=Auth::user()->id;
            $order_address->order_type=$request->order_type;
            $order_address->save();

        }
        
        return view('mobile.grocery.orderAddress');
    }
    // payment
    public function payment(Request $request)
    {
        
        // get last inserted data from order table
        // $order_address =  Order_addres::where('user_id',Auth::user()->id)->where('status',0)->get();
        
        // get data acording to user id and order id form order of this user using join
        $order_address = Order_addres::join('orders','order_addres.order_id','orders.id')
        ->select('orders.*','order_addres.*')
        ->where('orders.user_id',Auth::user()->id)
        ->where('orders.status',0)
        ->get();

        foreach($order_address as $order_addres)
        {
            $order_addres->house_no = $request->home_no;
            $order_addres->address1 = $request->street;   
            $order_addres->address2 = $request->address2;   
            $order_addres->city = $request->city;   
            $order_addres->state = $request->state;   
            $order_addres->pincode = $request->pin;   
            $order_addres->save();
        }

        return view('mobile.grocery.payment');
    }


    public function profile()
    {
        $data=User::all();
        return view('mobile.grocery.profile',compact('data'));
    }



    public function rental_hours()
    {
        return view('mobile.rental.rental-hours');
    }

    public function rental_plans()
    {
        return view('mobile.rental.rental-plans');
    }

    public function rental_pickup()
    {
        return view('mobile.rental.rental-pickup');
    }
    public function rental_payment()
    {
        return view('mobile.rental.rental-payment');
    }
    public function food()
    {
        return view('mobile.food.food-home');
    }

    public function food_category()
    {
        return view('mobile.food.food-category');
    }

    public function food_store()
    {
        return view('mobile.food.food-store');
    }

    // food_cart
    public function food_cart()
    {
        return view('mobile.food.cart');
    }

    public function food_checkout()
    {
        return view('mobile.food.checkout');
    }

    // Pharmacies
    public function pharmacies_home()
    {
        return view('mobile.pharmacies.pharmacies-home');
    }

    public function pharmacies_stores()
    {
        return view('mobile.pharmacies.pharmacies-stores');
    }

    public function pharmacies_list()
    {
        return view('mobile.pharmacies.pharmacies-list');
    }

    //rider_driver
    public function newlogin()
    {
        return view('mobile.rider.newlogin');
    }
    public function riderhome()
    {
        return view('mobile.rider.home');
    }
    public function rider_driver_book()
    {
        return view('mobile.rider.pickup');
    }
    public function rider_driver_bookingdetails()
    {
        return view('mobile.rider.accepting_2');
    }
    public function rider_driver_mybooking()
    {
        return view('mobile.rider.accepting_3');
    }
    public function rider_driver_order()
    {
        return view('mobile.rider.accepting_4');
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


    // plustocart
    public function plustocart(Request $request)
    {
        $cart = Cart::find($request->id);
        $cart->quantity = $cart->quantity + 1;
        $cart->save();
        if($cart){
         
        return response()->json([
            'success' => true,
            'message' => 'Product added to cart',
            'data' => $cart
        ], 200);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'Product not added to cart',
                'data' => ''
            ], 400);
        }
    }
    // mistocart
    public function mistocart(Request $request)
    {
        $cart = Cart::find($request->id);
        $cart->quantity = $cart->quantity - 1;
        if($cart->quantity == 0){
            $cart->delete();
        }
        else{
            $cart->save();
        }

        if($cart){
         
        return response()->json([
            'success' => true,
            'message' => 'Product added to cart',
            'data' => $cart
        ], 200);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'Product not added to cart',
                'data' => ''
            ], 400);
        }
    }
}