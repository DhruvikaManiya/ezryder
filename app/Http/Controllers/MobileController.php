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
use App\Requests;
use App\Reset_password;
use App\Review;
use App\Slider;
use App\User;
use App\User_vehicle;
use App\Wishlist;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Notificaation;
use App\Store;
use Illuminate\Support\Facades\DB;
use App\Address;
// use Stevebauman\Location\Facades\Location;

class MobileController extends Controller
{
    // login
    public function login()
    {

        return view('mobile.users.auth.login');
    }

    // register
    public function register()
    {
        return view('mobile.users.auth.register');
    }

    public function registerStore(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required',
        //     'confirm_password' => 'required|same:password',
        // ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->type = 0;
        // $user->save();
        Auth::login($user);
        return redirect()->route('ecommerce.home');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect()->route('mobile.login');
    }

    public function dashboard()
    {
        return view('mobile.users.dashboard');
    }

    public function login_check(Request $request)
    {
        // dd($request);

        $user = User::where("email", $request->email)->first();
        if ($user) {

            $user->fcmtoken = $request->fcmtoken;
            $user->save();

            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('mobile.dashboard');
            } else {
                return redirect()->back()->with('password', 'Password is incorrect');
            }
        } else {
            return redirect()->back()->with('email', 'Email is incorrect');
        }
    }

    public function addAddress()
    {
        return view('mobile.users.profile.add_address');
    }

    public function store_Address(Request $request)
    {
        // dd($request);
        $address = new Address;
        $address->full_address = $request->address;
        $address->mark = $request->mark;
        $address->lat = $request->lat;
        $address->long = $request->long;
        $address->user_id = Auth::user()->id;
        $address->default = 1;
        $address->save();

        return redirect()->route('ecommerce.cart.view');
    }
    public function addressChange()
    {
        $addresses =   Address::where('user_id', '=', Auth::user()->id)->get();
        return view('mobile.users.profile.address_change', compact('addresses'));
    }


    // grocery
    public function grocery(Request $request)
    {


        $category = Category::all();
        $slider = Slider::all();


        $store = User::where('store_type', 1)->get();
        // dd($store);
        $Product = product::join('subcategories', 'subcategories.id', '=', 'products.subcate_id')
            ->join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->select('products.*', 'subcategories.name as subcategory_name', 'categories.name as category_name')
            ->where('categories.type', 1)
            ->where('products.status', 1)
            ->where('products.verify', 1)
            ->get();


        $brand = brand::all();
        return view('mobile.grocery.grocery', compact('category', 'Product', 'brand', 'slider', 'store'));
    }
    // product list
    public function productList($id)
    {
        $category = Category::find($id);
        return view('mobile.grocery.productlist', compact('category'));
    }
    // subcateList
    public function subcateList($id)
    {
        $Product = Product::where('subcate_id', $id)->get();
        return view('mobile.grocery.subcateList', compact('Product'));
    }

    public function product_list($id)
    {
        $Product = product::join('subcategories', 'subcategories.id', '=', 'products.subcate_id')
            ->join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->select('products.*', 'subcategories.name as subcategory_name', 'categories.name as category_name')
            ->where('categories.type', 1)
            ->where('products.subcate_id', $id)
            ->get();
        return view('mobile.grocery.product_list', compact('Product'));
    }

    public function car_details (){

        $vehicle = User_vehicle::get();

        $requests = Requests::where('rider_id', \Illuminate\Support\Facades\Auth::user()->id)->orderby('created_at','desc')->first();

        if(!$requests){

            return view('mobile.rider.pickup-old');
        }

//        return view('mobile.rider.home-now',[
        return view('mobile.taxi-rider.confirmBooking',[
            'title' => "Book Taxi",
            "details" => $vehicle,
            "requests" => $requests
        ]);
    }

    //categoriesList
    public function categoriesList()
    {
        return view('mobile.grocery.categorieslist');
    }
    // cart
    public function cart()
    {
        $carts = Cart::join('products', 'carts.product_id', '=', 'products.id')
            ->join('subcategories', 'subcategories.id', '=', 'products.subcate_id')
            ->join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->select('carts.*', 'subcategories.name as subcategory_name', 'categories.name as category_name')
            ->where('categories.type', 1)
            ->where('carts.user_id', Auth::user()->id)
            ->get();

        return view('mobile.grocery.cart', compact('carts'));
    }
    public function paymentpPost(Request $request)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->delete();

        $order = Order::find($request->order_id);
        $order->status = 0;
        $order->save();
        return redirect()->route('mobile.order');
    }


    public function order(Request $request)
    {
        $order_list = Order::where('user_id', Auth::user()->id)->where('type', 1)->orderBy('id', 'DESC')->get();
        return view('mobile.grocery.order', compact('order_list'));
    }

    public function orderdetail()
    {
        $order = order::where('user_id', Auth::user()->id)->where('type', 1)->where('status', 0)->orderBy('id', 'DESC')->get();
        return view('mobile.grocery.orderdetail', compact('order'));
    }

    public function orderdetailp($id)
    {
        $order = Order::find($id);
        $rating = review::find($id);
        // dd($order);
        return view('mobile.grocery.oderdetailP', compact('order', 'rating'));
    }

    //product details
    public function productDetails($id)
    {
        $product = product::find($id);
        return view('mobile.users.ecommerce.product.view', compact('product'));
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
        $categories = Category::with('subcategory')->where('type', 1)->get();
        return view('mobile.grocery.category', compact('categories'));
    }
    //orderAddress
    public function orderAddress(Request $request)
    {

        // dd($request->all());

        $order_type = $request->order_type;

        $carts = Cart::where('user_id', Auth::user()->id)->get();

        $arr = [];
        $total = 0;
        $product_quantity = 0;
        foreach ($carts as $cart) {

            $product = product::find($cart->product_id);

            $ordered = new Ordered_product();
            $ordered->user_id = Auth::user()->id;
            $ordered->product_id = $cart->product_id;
            $ordered->quantity = $cart->quantity;
            $ordered->price = $cart->product->Sellar_price + (($cart->product->Sellar_price * $cart->product->admin_charge) / 100);
            $ordered->save();

            $arr[] = $ordered->id;
            $total += $cart->quantity * ($cart->product->Sellar_price + ($cart->product->Sellar_price * $cart->product->admin_charge) / 100);
            $product->quantity = $product->quantity - $cart->quantity;
            $product->save();
        }
        // dd($cart->product->user->store->id);
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->ordered_products = json_encode($arr);
        $order->store_id = $cart->product->user->store->id;
        $order->total = $total;

        $order->type = 1;
        $order->save();

        // $product=product::
        // $product->quantity=$product_quantity;
        // $product->update();

        return redirect()->route('mobile.address.page', ['order' => $order, 'order_type' => $order_type]);
    }

    public function addressPage($order, $order_type)
    {
        $order = Order::find($order);
        return view('mobile.grocery.orderAddress', compact('order', 'order_type'));
    }

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

        return redirect()->route('mobile.payment.page', ['payment' => $order_addres]);
    }

    public function paymentpage($payment)
    {
        $order_addres = Order_addres::find($payment);

        return view('mobile.grocery.payment', compact('order_addres'));
    }

    public function wishlist()
    {
        $Product = Wishlist::join('products', 'products.id', '=', 'wishlists.product_id')
            ->join('subcategories', 'subcategories.id', '=', 'products.subcate_id')
            ->join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->select('products.*', 'subcategories.name as subcategory_name', 'categories.name as category_name')
            ->where('categories.type', 1)
            ->where('wishlists.user_id', Auth::user()->id)
            ->get();

        return view('mobile.grocery.wishlist', compact('Product'));
    }
    public function store_wishlist(Request $request)
    {

        $count = wishlist::where('user_id', Auth::user()->id)->where('product_id', $request->id)->count();
        if ($count > 0) {
            wishlist::where('user_id', Auth::user()->id)->where('product_id', $request->id)->delete();
            return response()->json(['success' => 'Product removed from wishlist', 'status' => 'delete']);
        } else {

            $wishlist = new wishlist();
            $wishlist->user_id = Auth::user()->id;
            $wishlist->product_id = $request->id;
            $wishlist->save();

            return response()->json(['success' => 'Product added to wishlist', 'data' => $wishlist, 'status' => 'add', 'count' => $count]);
        }
    }
    // profile
    public function profile()
    {
        $user = User::find(Auth::user()->id);
        $favourite = Wishlist::where('user_id', Auth::user()->id)->get();
        return view('mobile.users.profile.profile', compact('user', 'favourite'));
    }
    public function profile_edit()
    {
        $user = User::find(Auth::user()->id);
        return view('mobile.users.profile.edit', compact('user'));
    }

    public function profile_update(request $request)
    {
        // dd($request);
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'address' => 'required|string|max:100',
                'city' => 'required|string|max:40',
                'area' => 'required|string|max:50',
                'state' => 'required|string|max:30',
                'country' => 'required|string|max:50',
                'pincode' => 'required|string|min:6|max:6',

            ]

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
        if ($request->hasFile('profile')) {
            $data->profile = UploadImage('/images/profile', $request->file('profile'));
        }
        $data->update();
        return redirect()->route('ecommerce.profile');
    }

    public function forgotPassword()
    {
        return view('mobile.grocery.forgotPassword');
    }

    public function postEmail(Request $request)
    {
        $find_user = User::where('email', $request->email)->first();
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

        $product_total = $cartup->quantity * ($cartup->product->Sellar_price + ($cartup->product->Sellar_price * $cartup->product->admin_charge) / 100);

        $cart = Cart::where('user_id', Auth::user()->id)->get();

        foreach ($cart as $cart) {

            $total += $cart->quantity * ($cart->product->Sellar_price + ($cart->product->Sellar_price * $cart->product->admin_charge) / 100);
        }

        $data = [
            'product_total' => $product_total,
            'cart' => $cart,
            'total' => $total,
        ];

        if ($cart) {
            return response()->json([
                'success' => true,
                'message' => 'Product added to cart',
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product not added to cart',
                'data' => '',
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
        $product_total = $cartUp->quantity * ($cartUp->product->Sellar_price + ($cartUp->product->Sellar_price * $cartUp->product->admin_charge) / 100);

        $cart = Cart::where('user_id', Auth::user()->id)->get();

        foreach ($cart as $cart) {

            $total += $cart->quantity * ($cart->product->Sellar_price + ($cart->product->Sellar_price * $cart->product->admin_charge) / 100);
        }

        $data = [
            'product_total' => $product_total,
            'cart' => $cartUp,
            'total' => $total,
        ];
        if ($cartUp) {

            return response()->json([
                'success' => true,
                'message' => 'Product added to cart',
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product not added to cart',
                'data' => '',
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

        $stores = User::where('name', 'like', $search . '%')->where('type', 2)->where('store_type', 1)->get();
        foreach ($stores as $store) {
            $html .= '<a class="row" href="' . route('mobile.store', $store->id) . '">
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

        $products = product::join('subcategories', 'subcategories.id', '=', 'products.subcate_id')
            ->join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->select('products.*', 'subcategories.name as subcategory_name', 'categories.name as category_name')
            ->where('categories.type', 1)
            ->where('products.name', 'like', $search . '%')
            ->get();
        foreach ($products as $product) {
            $html .= '<a class="row"  href="' . route('mobile.productdetails', $product->id) . '">
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
            'data' => $html,
        ], 200);
    }

    public function store($id)
    {
        $store = Store::find($id);
        $Product = Product::where('user_id', $store->user->id)->get();
        return view('mobile.grocery.store', compact('store', 'Product'));
    }

    public function rider()
    {
//        return view('mobile.rider.pickup-old');
        return view('mobile.taxi-rider.dropLocation');
    }

    public function rider_store(Request $request)
    {


        $validate = $request->validate([
            'pick_address' => 'required',
            'drop_address' => 'required',
        ]);

        if ($request->has('btn_later')) {
            $validate['is_schedule'] = 1;
            $validate['time'] = Carbon::parse($request->time)->format("Y-m-d H:m:s");
        }
        if ($request->has('btn_now')) {
            $validate['is_schedule'] = 0;
            $validate['time'] = Carbon::now()->format("Y-m-d H:m:s");
        }

        $validate['rider_id'] = Auth::user()->id;

        Requests::create($validate);

        return redirect()->route('mobile.homenow');
    }
    public function homenow(Type $var = null)
    {
        $vehicle = User_vehicle::get();

        $requests = Requests::where('rider_id', \Illuminate\Support\Facades\Auth::user()->id)->orderby('created_at','desc')->first();

        if(!$requests){

            return view('mobile.rider.pickup-old');
        }

//        return view('mobile.rider.home-now',[
        return view('mobile.taxi-rider.selectCar',[
            'title' => "Book Taxi",
            "details" => $vehicle,
            "requests" => $requests
        ]);
    }

    public function home_now_store(Request $request, $id)
    {

        $validate = $request->validate([
            'pick_address' => 'required',
            'drop_address' => 'required',
        ]);

        $vehicle_id = User_vehicle::where('id', $request->vehicle_id)->first();

        $validate['vehicle_id'] = $request->vehicle_id;

        $validate['driver_id'] = $vehicle_id->user_id;

        Requests::where('id', $id)->update($validate);

        return redirect()->route('mobile.rider.payment');
    }


    // rider_payment
    public function rider_payment(Request $request)
    {
        $requests = Requests::with(['vehicle' => function ($q) {
            $q->with('user');
        }])->where('rider_id', Auth::user()->id)->orderby('created_at', 'desc')->first();

        //        echo "<pre>";print_r($requests->toArray());die;

        return view('mobile.rider.rider-payment', [
            'title' => "",
            'request' => $requests
        ]);
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

    // nearbystore
    public function nearbystore(Request $request)
    {
        // $radius = 400;
        if ($request->lat != null || $request->lng != null) {

            $stores =  Store::select(
                "stores.id",
                DB::raw("6371 * acos(cos(radians(" . $request->lat . ")) 
        * cos(radians(stores.lat)) 
        * cos(radians(stores.long) - radians(" . $request->long . ")) 
        + sin(radians(" . $request->lat . ")) 
        * sin(radians(stores.lat))) AS distance"),
            )
                ->groupBy("stores.id")
                ->having("distance", "<", 10)
                ->get();

            $ids = $stores->pluck('id')->toArray();

            $stores = Store::whereIn('id', $ids)->get();
        } else {
            $stores = Store::all();
        }
        return response()->json([
            'success' => true,
            'message' => 'Search result',
            'data' => $stores,
        ], 200);
    }

    public function storeDetails($id)
    {
        $store = Store::find($id);
        $products = Product::where('store_id', $id)->get();
        return view('mobile.grocery.store-details');
    }
}
