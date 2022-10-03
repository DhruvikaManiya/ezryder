<?php

namespace App\Http\Controllers;

use App\User_vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Category;
use App\Subcategory;
use App\product;
use App\brand;
use App\Cart;
use App\Order;
use App\Order_addres;
use App\Ordered_product;
use App\Payment;
use App\Reset_password;
use App\Review;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as FacadesRoute;

class MobileController extends Controller
{
    // register
    public function register()
    {
        return view('mobile.grocery.register');
    }
    // public function register_store(request $request)
    // {

    //     $request->validate([
    //         'name' => 'required',
    //         'phone' => 'required|numeric|digits:10',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required',
    //         'confirm_password' => 'required|same:password',

    //     ]);
    //     $data = new User();
    //     $data->name = $request->name;
    //     $data->phone = $request->phone;
    //     $data->email = $request->email;
    //     $data->password = Hash::make($request->password);
    //     $data->save();
    //     // dd($data);
    //     return redirect()->route('mobile.grocery');
    // }

    public function registerStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'phone' => 'required|numeric|unique:users|digits:10',
            'confirm_password' => 'required|same:password',
        ]);
        $user = User::where('email', $request->email)->where('type', 0)->first();

        if (!$user) {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->save();
            if ($user) {
                Auth::login($user);
                return redirect()->route('mobile.grocery')->with('success', 'Registration Successful');
            } else {
                return redirect()->back()->with('error', 'Registration Failed');
            }
        } else {
            return redirect()->back()->with('email', 'Email already exist');
        }
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
       
        $user = User::where("email", $request->email)->first();
        if ($user) {

            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('mobile.home');
                
            } else {
                return redirect()->back()->with('password', 'Password is incorrect');
            }
        } else {
            return redirect()->back()->with('email', 'Email is incorrect');
        }
    }
    // grocery
    public function grocery()
    {
        $category = Category::all();
        // $Product = product::all();
        $Product=product::join('subcategories','subcategories.id','=','products.subcate_id')
        ->join('categories','categories.id','=','subcategories.category_id')
        ->select('products.*','subcategories.name as subcategory_name','categories.name as category_name')
        ->where('categories.type',1)
        ->get();
    
        $brand = brand::all();
        return view('mobile.grocery.grocery', compact('category', 'Product', 'brand'));
    }
    // product list
    public function productList($id)
    {
       $category = Category::find($id);
        return view('mobile.grocery.productlist', compact('category'));
    }
    //categoriesList
    public function categoriesList()
    {
        return view('mobile.grocery.categorieslist');
    }
    // cart
    public function cart()
    {
        $carts=Cart::join('products','carts.product_id','=','products.id')
        ->join('subcategories','subcategories.id','=','products.subcate_id')
        ->join('categories','categories.id','=','subcategories.category_id')
        ->select('carts.*','subcategories.name as subcategory_name','categories.name as category_name')
        ->where('categories.type',1)
        ->where('carts.user_id',Auth::user()->id)
        ->get();
        return view('mobile.grocery.cart', compact('carts'));
    }


    public function order(Request $request)
    {
      
        
        $order_list = Order::where('user_id', Auth::user()->id)->where('status', '!=', 0)->orderBy('id', 'DESC')->get();
        return view('mobile.grocery.order', compact('order_list'));
    }

    public function orderdetail()
    {
        $order = order::where('user_id', Auth::user()->id)->where('status', '!=', 0)->orderBy('id', 'DESC')->get();
        return view('mobile.grocery.orderdetail', compact('order'));
    }
     
    public function orderdetailp($id)
    {
        $order = Order::find($id);
        $rating = review::find($id);
        // dd($order);
        return view('mobile.grocery.oderdetailP',compact('order','rating'));
    }

    //product details
    public function productDetails($id)
    {
        $item = product::find($id);
        $products = product::where('user_id',$item->user_id)->get();
        return view('mobile.grocery.productdetails',compact('item','products'));
    }
    
    // checkout
    public function checkout()
    {
        return view('mobile.grocery.checkout');
    }
   

    // category
    public function category()
    {
        // $categories = Category::all();
        // $subcategories = Subcategory::where('category_id')->get();
        $categories = Category::with('subcategory')->where('type',1)->get();
        return view('mobile.grocery.category', compact('categories'));
    }
    //orderAddress
    public function orderAddress(Request $request)
    {

        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $arr = [];
        $total = 0;
        foreach ($carts as $cart) {
            $product = product::find($cart->product_id);

            $ordered = new Ordered_product();
            $ordered->user_id = Auth::user()->id;
            $ordered->product_id = $cart->product_id;
            $ordered->quantity = $cart->quantity;
            $ordered->price = $cart->product->price - (($cart->product->price * $cart->product->Dis_price) / 100);
            $ordered->save();
            $arr[] = $ordered->id;

            $total += $cart->quantity * ($cart->product->price - ($cart->product->price * $cart->product->Dis_price) / 100);
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->ordered_products = json_encode($arr);
        $order->vendor_id = $cart->product->user_id;
        $order->total = $total;
        $order->status = 0;

        $order->save();





        return view('mobile.grocery.orderAddress', compact('order'));
    }
    // payment
    public function payment(Request $request)
    {

        $request->validate([
            'home_no' => 'required',
            'street' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pin' => 'required',

        ]);

        $order_addres = new Order_addres();
        $order_addres->order_id = $request->order_id;
        $order_addres->user_id = Auth::user()->id;
        $order_addres->house_no = $request->home_no;
        $order_addres->address1 = $request->street;
        $order_addres->address2 = $request->address;
        $order_addres->city = $request->city;
        $order_addres->state = $request->state;
        $order_addres->pincode = $request->pin;
        $order_addres->save();


        return view('mobile.grocery.payment', compact('order_addres'));
    }

    // profile
    public function profile()
    {
        $data = User::find(Auth::user()->id);
        return view('mobile.grocery.profile', compact('data'));
    }
    public function profile1()
    {
        $user = User::find(Auth::user()->id);
        return view('mobile.grocery.profileedit', compact('user'));
    }

    public function profile_edit(request $request)
    {
        // dd($request);
        $this->validate(
            $request,
            [
                'name'            =>      'required|string|max:255',
                'email'             =>      'required|email',
                'phone'             =>      'required|numeric|digits:10',
                'address'            =>      'required|string|max:100',
                'city'            =>      'required|string|max:40',
                'area'            =>      'required|string|max:50',
                'state'            =>      'required|string|max:30',
                'country'            =>      'required|string|max:50',
                'pincode'            =>      'required|string|min:6|max:6',

            ]
            // [
            //     'pincode.min' => 'You have to choose the file!',
            //     'profile.size' => 'You have to choose type of the file!'
            //     // 'profile.*' => 'this is text'
            // ]
        );

        $data = User::find(Auth::user()->id);
        $data->email = $request->input('email');
        $data->password = Hash::make($request->input('password'));
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        $data->city = $request->input('city');
        $data->area = $request->input('area');
        $data->state = $request->input('state');
        $data->country = $request->input('country');
        $data->name = $request->input('name');
        $data->pincode = $request->input('pincode');
        $data->profile = UploadImage('/images/profile', $request->file('profile'));
        $data->update();
        return redirect()->route('mobile.profile');
    }

    public function forgotPassword()
    {
        return view('mobile.grocery.forgotPassword');
    }


    public function postEmail(Request $request)
    {
        $find_user =  User::where('email', $request->email)->first();
        if ($find_user) {
            $otp = rand(1000, 9999);

            $user = new Reset_password();
            $user->otp = $otp;
            $user->user_id = $find_user->id;
            $user->save();

            $d = [
                'email' => $request->email,
            ];

            $data = [
                'otp' => $otp,
            ];
            Mail::send('mobile.grocery.mail', $data, function ($message) use ($d) {
                $message->to($d['email'], 'Reset Password')->subject('Reset Your Password');

                $message->from('pankaj.bmcoder@gmail.com', 'Ezryder');
            });

            return view('mobile.grocery.otpverify', compact('user'));
        } else {
            return redirect()->back()->with('error', 'Email not found');
        }
    }

    public function verifyotp(Request $request)
    {
        $otp = implode('', $request->otp);

        $email = $request->email;
        $data = User::where('email', '=', $request->email)->first();
        $user = Reset_password::where('user_id', $data->id)->where('otp', $otp)->orderBy('id', 'desc')->first();


        if ($user->otp == $otp) {
            return view('mobile.grocery.reset', compact('user'));
        }
        return redirect()->back()->with('error', 'OTP does not match');
    }

    public function reset(Request $request)
    {

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->update();

        return redirect()->route('mobile.login')->with('success', 'Password Changed Successfully');
    }

    // ratting //
    public function ratting(Request $request)
    {
        $data = new Review();
        $data->user_id = Auth::user()->id;
        $data->product_id = $request->id;
        $data->review = $request->review;
        $data->rating = $request->rating;
        $data->save();
        return redirect()->back();
        
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
        $total = 0;
        $cartup = Cart::find($request->id);
        $cartup->quantity = $cartup->quantity + 1;
        $cartup->save();

        $product_total = $cartup->quantity * ($cartup->product->price - ($cartup->product->price * $cartup->product->Dis_price) / 100);

        $cart = Cart::where('user_id', Auth::user()->id)->get();

        foreach ($cart as $cart) {

            $total += $cart->quantity * ($cart->product->price - ($cart->product->price * $cart->product->Dis_price) / 100);
        }

        $data = [
            'product_total' => $product_total,
            'cart' => $cart,
            'total' => $total
        ];

        if ($cart) {
            return response()->json([
                'success' => true,
                'message' => 'Product added to cart',
                'data' => $data
            ], 200);
        } else {
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
        $total = 0;
        $cartUp = Cart::find($request->id);
        $cartUp->quantity = $cartUp->quantity - 1;
        if ($cartUp->quantity == 0) {
            $cartUp->delete();
        } else {

            $cartUp->save();
        }
        $product_total = $cartUp->quantity * ($cartUp->product->price - ($cartUp->product->price * $cartUp->product->Dis_price) / 100);


        $cart = Cart::where('user_id', Auth::user()->id)->get();

        foreach ($cart as $cart) {

            $total += $cart->quantity * ($cart->product->price - ($cart->product->price * $cart->product->Dis_price) / 100);
        }

        $data = [
            'product_total' => $product_total,
            'cart' => $cartUp,
            'total' => $total
        ];
        if ($cartUp) {

            return response()->json([
                'success' => true,
                'message' => 'Product added to cart',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product not added to cart',
                'data' => ''
            ], 400);
        }
    }


    public function search()
    {
        return view('mobile.grocery.search');
    }

    // search_qry
    public function search_qry(Request $request)
    {
        // dd($request->all());
        $search = $request->search;

        $html = '<div class="label">Store</div>';
        

        $stores = User::where('name', 'like', $search . '%')->where('type',2)->where('store_type',1)->get();
        foreach ($stores as $store) {
            $html .= '<a class="row" href="'.route('mobile.store',$store->id).'">
            <div class="col-2">';
            if ($store->profile != '') {
                $html .= '<img class="store_icon" src="' . asset($store->profile) . '" alt="store icon">';
            } else {
                $html .= '<img class="store_icon" src="' . asset('asset/images/store-icon.svg') . '" alt="store icon">';
            }
            $html .= '
            </div>
            <div class="col-10" id="store_details">
                <p class="store_name">' . $store->name . '</p>
            </div>
        </a>';
        }
        
        $html .= '<div class="label">product</div>';

        $products = product::join('subcategories','subcategories.id','=','products.subcate_id')
        ->join('categories','categories.id','=','subcategories.category_id')
        ->select('products.*','subcategories.name as subcategory_name','categories.name as category_name')
        ->where('categories.type',1)
        ->where('products.name', 'like', $search . '%')
        ->get();
        foreach ($products as $product) {
            $html .= '<a class="row"  href="'.route('mobile.productdetails',$product->id).'">
            <div class="col-2">';
            if ($product->p_image != '') {
                $html .= '<img class="store_icon" src="' . asset($product->p_image) . '" alt="store icon">';
            } else {
                $html .= '<img class="store_icon" src="' . asset('asset/images/circle.png') . '" alt="store icon">';
            }
            $html .= '
            </div>
            <div class="col-10" id="store_details">
                <p class="store_name">' . $product->name . '</p>
            </div>
            </a>';
        }

        return response()->json([
            'success' => true,
            'message' => 'Search result',
            'data' => $html
        ], 200);
    }

    public function store($id)
    {
        $store = User::find($id);
        $products = Product::where('user_id', $id)->get();
        return view('mobile.grocery.store', compact('store', 'products'));
    }



    public function rider()
    {
        return view('mobile.rider.pickup-old');
    }
    public function homenow(Type $var = null)
    {
        $vehicle = User_vehicle::get();


        return view('mobile.rider.home-now',[
            'title' => "Book Taxi",
            "details" => $vehicle
        ]);
    }

    // rider_payment
    public function rider_payment(Request $request)
    {
       return view('mobile.rider.rider-payment');
    }
    // my_booking
    public function my_booking(Request $request)
    {
        return view('mobile.rider.my-booking');
    }
    // riderdetails
    public function riderdetails(Request $request)
    {
        return view('mobile.rider.rider-booking-details');
    }
}