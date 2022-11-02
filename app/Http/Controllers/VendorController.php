<?php

namespace App\Http\Controllers;

use App\Category;
use App\Holiday;
use App\product;
use App\product_images;
use App\Store;
use App\Store_time;
use App\User;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Use_;
use App\bank_details;
use App\Order;
use App\Order_addres;
use App\Reset_password;
use Illuminate\Support\Facades\Mail;
use App\Subcategory;
use App\Notificaation;
use App\StoreType;
use App\OrderItem;

class VendorController extends Controller
{

    public function login(request $request)
    {

        return view('mobile.vendor.login');
    }
    public function loginCheck(Request $request)
    {
        // dd($request->all());
        $user = User::where("email", $request->email)->where('type', 2)->first();
        if ($user) {

            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('vendor.dashboard')->with('success', 'Login Successfully');
            } else {
                return redirect()->back()->with('password', 'Password is incorrect');
            }
        } else {
            return redirect()->back()->with('email', 'Email is incorrect');
        }
    }
    public function register()
    {

        $store_types = StoreType::get();
        return view('mobile.vendor.register', compact('store_types'));
    }
    public function registerStore(Request $request)
    {
        // $this->validate(
        //     $request,
        //     [
        //         'name' => 'required',
        //         'email' => 'required|email|unique:users',
        //         'password' => 'required',
        //         'phone' => 'required|numeric|unique:users',
        //         'confirm_password' => 'required|same:password',
        //     ],
        //     [
        //         'email.required' => 'Email is required',
        //         'email.email' => 'Email is invalid',
        //         'email.unique' => 'Email already exists',
        //         'password.required' => 'Password is required',
        //         'password.alpha_num' => 'Password must be alphanumeric',
        //         'password.min' => 'Password must be at least 8 characters',
        //         'phone.required' => 'Phone is required',
        //         'phone.numeric' => 'Phone must be numeric',
        //         'phone.unique' => 'Phone already exists',
        //         'confirm_password.required' => 'Confirm password is required',
        //         'confirm_password.same' => 'Confirm password must be same as password',

        //     ]
        // );


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->store_type_id = $request->store_type_id;
        $user->type = 2;
        $user->phone = $request->phone;
        $user->save();
        if ($user) {
            Auth::login($user);
            return redirect()->route('vendor.dashboard')->with('success', 'Registration Successful');
        } else {
            return redirect()->back()->with('error', 'Registration Failed');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect()->route('vendor.login');
    }
    public function forgotpassword()
    {
        // dd('ok');
        return view('mobile.vendor.forgotpassword');
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
            Mail::send('mobile.vendor.mail', $data, function ($message) use ($d) {
                $message->to($d['email'], 'Reset Password')->subject('Reset Your Password');

                $message->from('pankaj.bmcoder@gmail.com', 'Ezryder');
            });

            return view('mobile.vendor.otpverify', compact('user'));
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
            return view('mobile.vendor.reset', compact('user'));
        }
        return redirect()->back()->with('error', 'OTP does not match');
    }

    public function reset(Request $request)
    {

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->update();

        return redirect()->route('vendor.login')->with('success', 'Password Changed Successfully');
    }
    public function home()
    {

        return view('mobile.vendor.home');
    }
    public function dashboard()
    {
        // $notifications = notificaation::where('status', 0)->where('user_id', Auth::user()->id)->get();

        // if (Auth::user()->store) {

        //     $pending_orders = Order::where('store_id', AUth::user()->store->id)->where('status', 0)->count();
        //     $process_orders = Order::where('store_id', AUth::user()->store->id)->where('status', 1)->count();
        //     $completed_orders = Order::where('store_id', AUth::user()->store->id)->where('status', 2)->count();
        //     $reject_orders = Order::where('store_id', AUth::user()->store->id)->where('status', 3)->count();
        //     $acceped_orders = Order::where('store_id', AUth::user()->store->id)->where('status', 4)->count();
        //     $de_accpect_orders = Order::where('store_id', AUth::user()->store->id)->where('status', 5)->count();
        //     $cancel_orders = Order::where('store_id', AUth::user()->store->id)->where('status', 6)->count();
        //     $total_orders = Order::where('store_id', AUth::user()->store->id)->count();

        //     // $completed_orders = Order::where('store_id', Auth::user()->id)->where('status', '!=', 1)->where('status', '!=', 5)->where('status', '!=', 0)->count();
        //     $active_products = product::where('user_id', Auth::user()->id)->where('status', 1)->where('verify', 1)->count();
        //     $inactive_products = product::where('user_id', Auth::user()->id)->where('status', 2)->count();
        //     $store = 1;
        //     return view('mobile.vendor.dashboard', compact('store','pending_orders', 'process_orders', 'completed_orders', 'cancel_orders', 'reject_orders', 'total_orders', 'acceped_orders', 'de_accpect_orders', 'active_products', 'inactive_products', 'notifications'));
        // } else {
        //     $store = 0;
        // }
        
        $store = Store::where('user_id', Auth::id())->first();

        $order = Order::where('store_user_id', NULL)
                ->where('store_id', $store->id)
                ->first();

        if($order) {
            $order_id = $order->id;

        }else {
            $order_id = 0;
        }

        
        $data = ['order_id' => $order_id];
        // dd($order);
        
        return view('mobile.vendor.dashboard', $data);

    }
    
    public function pendingorders()
    {

        $order_list = Order::where('store_id', AUth::user()->store->id)->where('status', 0)->orderBy('id', 'DESC')->get();
        $title = 'Pending Orders';
        return view('mobile.vendor.pendingorders', compact('order_list', 'title'));
    }
    public function processorders()
    {
        $order_list = Order::where('store_id',  AUth::user()->store->id)->where('status', 1)->orderBy('id', 'DESC')->get();
        $title = 'Processing Orders';
        return view('mobile.vendor.pendingorders', compact('order_list', 'title'));
    }
    public function rejectorders()
    {
        $order_list = Order::where('store_id',  AUth::user()->store->id)->where('status', 3)->orderBy('id', 'DESC')->get();
        $title = 'Rejected Orders';
        return view('mobile.vendor.pendingorders', compact('order_list', 'title'));
    }
    public function cancelorders()
    {
        $order_list = Order::where('store_id',  AUth::user()->store->id)->where('status', 6)->orderBy('id', 'DESC')->get();
        $title = 'Canceled Orders';

        return view('mobile.vendor.pendingorders', compact('order_list', 'title'));
    }
    public function pickuporders()
    {
        $order_list = Order::where('store_id',  AUth::user()->store->id)->where('status', 4)->orderBy('id', 'DESC')->get();
        $title = 'Pickup Orders';
        return view('mobile.vendor.pendingorders', compact('order_list', 'title'));
    }
    public function pickupdoneorders()
    {
        $order_list = Order::where('store_id',  AUth::user()->store->id)->where('status', 5)->orderBy('id', 'DESC')->get();
        $title = 'Pickup Done';
        return view('mobile.vendor.pendingorders', compact('order_list', 'title'));
    }

    public function completeorders()
    {

        $order_list = Order::where('store_id',  AUth::user()->store->id)->where('status', 2)->orderBy('id', 'desc')->get();
        $title = 'Complete Orders';

        return view('mobile.vendor.pendingorders', compact('order_list', 'title'));
    }
    public function allorders()
    {
        $order_list = Order::where('store_id',  AUth::user()->store->id)->orderBy('id', 'desc')->get();
        $title = 'All Orders';
        return view('mobile.vendor.pendingorders', compact('order_list', 'title'));
    }

    

    public function order_hostory()
    {
        $order_list = Order::where('store_id',  AUth::user()->store->id)->orderBy('id', 'desc')->get();
        return view('mobile.vendor.order_history', compact('order_list'));
    }


    // profile
    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('mobile.vendor.profile', compact('user'));
    }

    public function profile_edit(request $request)
    {
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
                'pincode' => 'required|string',
                'profile' => 'image|mimes:jpeg,png,jpg,svg| required',

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
        $data->profile = UploadImage('/images/profile', $request->file('profile'));
        $data->update();

        $vendor = new vendor();

        if ($data->vendor) {
            $vendor = vendor::find($data->vendor->id);
        }
        $vendor->user_id = Auth::user()->id;
        $vendor->save();

        return redirect()->route('vendor.account')->with('success', 'Profile Updated Successfully');
    }
    public function approve_vendor()
    {
        $user = Vendor::find(Auth::user()->id);
        $user->status = 1;
        $user->update();
        return redirect()->route('vendor.dashboard')->with('success', 'Your Account is Approved');
    }
    // analytics
    public function analytics()
    {
        $compelete_order = Order::where('store_id', Auth::user()->id)->orwhere('status', 2)->count();
        $product = product::join('subcategories', 'subcategories.id', '=', 'products.subcate_id')
            ->join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->select('products.*', 'subcategories.name as subcategory_name', 'categories.name as category_name')
            ->where('categories.type', 1)
            ->where('user_id', Auth::user()->id)->where('status', 1)
            ->get();



        return view('mobile.vendor.analytics', compact('compelete_order', 'product'));
    }
    // account
    public function account()
    {
        $user = User::find(Auth::user()->id);
        $store = store::where('user_id', Auth::user()->id)->first();
        return view('mobile.vendor.account', compact('user', 'store'));
    }

    // products
    public function addproducts()
    {
       
        $store_type = Auth::user()->store_type_id;

        $catogeries = Category::where('type', $store_type)->get();
        
        return view('mobile.vendor.addproducts', compact('catogeries'));
    }
    //store products
    public function product_store(request $request)
    {


        // $request->validate(
        //     [

        //         'name' => 'required|string',
        //         'MRP' => 'required|numeric',
        //         'Sellar_price' => 'required|numeric',
        //         'description' => 'required|string',
        //         'p_image' => 'required|image',
        //         'quantity' => 'required|numeric',
        //     ]
        // );
       
        $product = new product();
        $product->name = $request->name;
        $product->subcate_id = $request->subcate_id;
        $product->category_id = $request->category_id;
        $product->store_type_id = Auth::user()->store_type_id;
        $product->store_id = Auth::user()->store->id;
        $product->user_id = Auth::user()->id;
        $product->description = $request->description;
        $product->mrp_price = $request->mrp;
        $product->seller_price = $request->Sellar_price;
        $product->units = $request->units;
        $product->measurement = $request->measurement;
        $product->p_image = UploadImage('/images/product', $request->file('p_image'));
        $product->save();


        // if ($request->image) {
        //     if (count($request->image) > 0) {

        //         foreach ($request->image as $image) {
        //             $product_images = new product_images();
        //             $product_images->product_id = $product->id;
        //             $product_images->image = UploadImage('/images/product', $image);
        //             $product_images->save();
        //             // dd($product_images);
        //         }
        //     }
        // }
        return redirect()->route('vendor.products');
    }

    public function product($id)
    {
        
        return view('mobile.vendor.product');
    }

    public function products()
    {
        $products = product::where('user_id', Auth::user()->id)->get();
        $user = User::find(Auth::user()->id);
        return view('mobile.vendor.products', compact('products', 'user'));
    }

    public function active_product(Request $request)
    {

        $product = product::find($request->id);
        $product->vendor_status = $product->vendor_status == 1 ? 0 : 1;
        $product->save();
        
        return response()->json(['success' => 'Status change successfully.']);
    }

    public function inactive_product($id)
    {
        $products = product::find($id);
        $products->status = 1;
        $products->save();
        return response()->json(['success' => 'Status change successfully.']);
    }

    public function check_active_prod()
    {
        $products = product::where('user_id', Auth::user()->id)->where('status', 1)->get();
        $user = User::all();
        return view('mobile.vendor.products', compact('products', 'user'));
    }

    public function check_inactive_prod()
    {
        $products = product::where('user_id', Auth::user()->id)->where('status', 2)->get();
        $user = User::all();
        return view('mobile.vendor.products', compact('products', 'user'));
    }
    public function wallet()
    {
        return view('mobile.vendor.wallet');
    }
    //bank details...
    public function bankdetail(request $request)
    {
        $bank = bank_details::where('user_id', Auth::user()->id)->first();

        return view('mobile.vendor.bankdetail', compact('bank'));
    }
    public function bankdetail_store(request $request)
    {
        $this->validate(
            $request,
            [
                'bank_name' => 'required|string|max:255',
                'act_name' => 'required|string|max:255',
                'act_no' => 'required|numeric|digits_between:8,16',
                'act_no_confirm' => 'required|same:act_no',
                'ifsc_code' => 'required|string',


            ],
            [
                'act_no_confirm.same' => ' The account number dose not match',
                'act_no.digits_between' => 'The account number must be between 8 to 16',
            ]

        );
        // dd($request);
        $bank = new bank_details();
        $bank->bank_name = $request->bank_name;
        $bank->act_name = $request->act_name;
        $bank->act_no = $request->act_no;
        $bank->user_id = Auth::user()->id;

        $bank->ifsc_code = $request->ifsc_code;
        $bank->save();
        // dd($bank);  
        return redirect()->route('vendor.account');
    }
    public function bankdetail_edit($id)
    {
        $bank = bank_details::all();
        return view('mobile.vendor.editbankdetails', compact('bank'));
    }
    public function bankdetail_update(request $request)
    {
        $this->validate(
            $request,
            [
                'bank_name' => 'required|string|max:255',
                'act_name' => 'required|string|max:255',
                'act_no' => 'required|numeric|digits_between:8,16',
                'act_no_confirm' => 'required|same:act_no',
                'ifsc_code' => 'required|string',


            ],
            [
                'act_no_confirm.same' => ' The account number dose not match',
                'act_no.digits_between' => 'The account number must be between 8 to 16',
            ]

        );
        // dd($request);
        $bank = bank_details::find($request->id);
        $bank->bank_name = $request->bank_name;
        $bank->act_name = $request->act_name;
        $bank->act_no = $request->act_no;
        $bank->user_id = Auth::user()->id;
        $bank->ifsc_code = $request->ifsc_code;
        $bank->update();
        //  dd($bank);  
        return redirect()->route('vendor.account');
    }

    public function review()
    {
        return view('mobile.vendor.review');
    }

    public function orders()
    {
        

        $store = Store::where('user_id', Auth::id())->first();

        $orders = Order::where('store_id', $store->id)
                ->orderBy('id', 'desc')->get();
        return view('mobile.vendor.orders', compact('orders'));
    }

    public function order_detail($id)
    {
        $order_items = OrderItem::where('order_id', $id)->get();

        $order = Order::where('id', $id)->first();

        //    dd($product->product_images);
        $data = [
            'order_items' => $order_items,
            'order' => $order
            ];    
        
        return view('mobile.vendor.order-detail', $data);
    }

    public function order_detail_p($id)
    {
        $order = Order::find($id);

        return view('mobile.vendor.order-detail-p', compact('order'));
    }
    public function order_detail_p_accepted($id)
    {
        $order = Order::find($id);
        $order->status = 1;
        $order->save();
        return redirect()->back();
    }
    public function order_detail_p_deny($id)
    {
        $order = Order::find($id);
        $order->status = 3;
        $order->save();
        return redirect()->back();
    }
    public function order_detail_p_delivered($id)
    {
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        return redirect()->back();
    }
    public function order_details_p_processed($id)
    {
        $order = Order::find($id);
        $order->status = 4;
        $order->save();
        return redirect()->back();
    }


    public function search()
    {
        return view('mobile.vendor.search');
    }

    // search_qry
    public function search_qry(Request $request)
    {
        // dd($request->all());
        $search = $request->search;

        $html = '<div class="label">product</div>';

        $products = product::join('subcategories', 'subcategories.id', '=', 'products.subcate_id')
            ->join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->select('products.*', 'subcategories.name as subcategory_name', 'categories.name as category_name')
            ->where('categories.type', 1)
            ->where('products.name', 'like', $search . '%')
            ->where('products.user_id', Auth::user()->id)
            ->get();

        foreach ($products as $prod) {
            $html .= '<div class="frt-price-box d-flex  top-space30">
            <div>
                <img src="' . asset($prod->p_image) . '" alt="" style="    width: 150px;
                height: 90px;">
            </div>
            <div class="frt-b-data ml-11-m ml-3">
                <p>' . $prod->name . ' </p>
                <p>' . $prod->prod_details . '</p>
                <p class="price"><del>$' . $prod->price . '</del>
                    $' . ($prod->price - ($prod->price * $prod->Dis_price) / 100) . '</p>
            </div>
            <div class="mt-07 ml-auto">';
            if ($prod->status == 1) {

                $html .= '  <input class="input-switch" name="status" checked type="checkbox" value="' . $prod->status . '"
                    id="product' . $prod->id . '" />
                <label class="label-switch" for="product' . $prod->id . ' "
                    data-product="' . $prod->id . '"></label>
                <span class="info-text"></span>';
            } else {

                $html .= '  <input class="input-switch" name="status"  type="checkbox" value="' . $prod->status . '"
                    id="product' . $prod->id . '" />
                <label class="label-switch" for="product' . $prod->id . ' "
                    data-product="' . $prod->id . '"></label>
                <span class="info-text"></span>';
            }

            $html .= ' </div>
        </div>';
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
        return view('mobile.vendor.store', compact('store', 'products'));
    }
    public function get_subcategory(Request $request)
    {
        $category = Subcategory::where('category_id', $request->id)->get();
        return response()->json($category);
    }

    public function notification_store()
    {

        $notifications = Notificaation::where('user_id', Auth::user()->id)->where('status', 0)->get();
        foreach ($notifications as $noti) {
            $noti->status = 1;
            $noti->save();
        }
        return view('mobile.vendor.notification', compact('notifications'));
    }

    //holiday

    public function holiday()
    {
        return view('mobile.vendor.holiday');
    }
    public function holiday_store(Request $request)
    {
        // dd($request->all());
        // $request->validate( [
        //         'date' => 'required | date',
        //         'message' => 'required |string',
        //     ]);

        $holiday = new Holiday();
        $holiday->date = $request->date;

        $holiday->message = $request->message;

        // $holiday->stor=Auth::user()->id;
        $holiday->save();
        // dd($holiday);

        return redirect()->route('vendor.holiday.list');
    }

    public function holiday_list()
    {
        $holidays = Holiday::all();

        return view('mobile.vendor.holiday_list', compact('holidays'));
    }

    public function add_store()
    {

        return view('mobile.vendor.add_store');
    }
     public function edit_store($id)
    {
        $store = Store::find($id);
        return view('mobile.vendor.edit_store',compact('store'));
    }
    public function store_store(Request $request)
    {
        // $request->validate = ([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'phone' => 'required',
        //     'address' => 'required',
        //     'city' => 'required',
        //     'state' => 'required',
        //     'country' => 'required',
        //     'storeman_name' => 'required',
        //     'image' => 'required',
        //     'vat' =>  'required',
        // ]);
// dd($request);
        $store = new Store();
        $store->user_id = Auth::user()->id;
        $store->store_type_id = Auth::user()->store_type_id;
        $store->name = $request->name;
        $store->email = $request->email;
        $store->phone = $request->phone;
        $store->address = $request->address;
        $store->city = $request->city;
        $store->state = $request->state;
        $store->country = $request->country;
        $store->area = $request->area;
        $store->contact_person_name = $request->storeman_name;
        $store->logo = UploadImage('/images/store', $request->file('image'));
        $store->lat = $request->lat;
        $store->lon = $request->long;
        $store->vat = $request->vat;
        $store->save();
        return redirect()->route('vendor.store_list');
    }
    public function store_update(Request $request)
    {
       
        $store = Store::find($request->id);
        $store->user_id = Auth::user()->id;
        $store->store_type_id = Auth::user()->store_type_id;
        $store->name = $request->name;
        $store->email = $request->email;
        $store->phone = $request->phone;
        $store->address = $request->address;
        $store->city = $request->city;
        $store->state = $request->state;
        $store->country = $request->country;
        $store->area = $request->area;
        $store->contact_person_name = $request->storeman_name;
        if($request->file('image')){
        $store->logo = UploadImage('/images/store', $request->file('image'));
              
        }
        $store->lat = $request->lat;
        $store->lon = $request->long;
        $store->vat = $request->vat;
        $store->save();
        return redirect()->route('vendor.store_list');
    }

    public function store_list()
    {
        $store = Store::where('user_id',Auth::user()->id)->first();
        return view('mobile.vendor.store_list', compact('store'));
    }

    public function store_time()
    {   
        $store_time= '';
        if(Auth::user()->store)
        {
            $store_time = Store_time::where('store_id', Auth::user()->store->id)->get();
        }

        return view('mobile.vendor.store_timing',compact('store_time'));
    }
    public function store_time_store(Request $request)
    {
        
        $store = Store_time::where('store_id', $request->store_id)->get();
        
        foreach ($request->days as $day) {
            if ($store == '[]') {
                $store_time = new Store_time();
            } else {
                $store_time = Store_time::where('store_id', $request->store_id)->where('day', $day)->first();
                if(!$store_time)
                {
                    $store_time = new Store_time();
                }
            }

            $store_time->store_id = $request->store_id;
            $store_time->day = $day;
            $store_time->start_time = $request->startningtime[$day-1];
            $store_time->closing_time = $request->closingtime[$day-1];
            $store_time->save();
        }

        return redirect()->route('vendor.account');
    }
}
