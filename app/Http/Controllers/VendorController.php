<?php

namespace App\Http\Controllers;

use App\Category;
use App\product;
use App\product_images;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Use_;
use App\bank_details;
use App\Order;
use App\Order_addres;
use App\Reset_password;
use Illuminate\Support\Facades\Mail;

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
                return redirect()->route('vendor.dashboard');
            } else {
                return redirect()->back()->with('password', 'Password is incorrect');
            }
        } else {
            return redirect()->back()->with('email', 'Email is incorrect');
        }
    }
    public function register()
    {

        return view('mobile.vendor.register');
    }
    public function registerStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'phone' => 'required|numeric|unique:users|digits:10',
            'confirm_password' => 'required|same:password',
        ],
        [
            'email.required'            =>      'Email is required',
            'email.email'               =>      'Email is invalid',
            'email.unique'              =>      'Email already exists',
            'password.required'         =>      'Password is required',
            'password.alpha_num'        =>      'Password must be alphanumeric',
            'password.min'              =>      'Password must be at least 8 characters',
            'phone.required'            =>      'Phone is required',
            'phone.numeric'             =>      'Phone must be numeric',
            'phone.unique'              =>      'Phone already exists',
            'phone.digits'              =>      'Phone must be 10 digits',
            'confirm_password.required' =>      'Confirm password is required',
            'confirm_password.same'     =>      'Confirm password must be same as password',
        
        ]
    );

     
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->store_type = $request->store_type;
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
            Mail::send('mobile.vendor.mail', $data, function ($message) use ($d) {
                $message->to($d['email'], 'Reset Password')->subject('Reset Your Password');

                $message->from('pankaj.bmcoder@gmail.com', 'Ezryder');
            });

            return view('mobile.vendor.otpverify', compact('user'));
        }
        else
        {
            return redirect()->back()->with('error', 'Email not found');
        }
    }

    public function verifyotp(Request $request)
    {
        $otp = implode('', $request->otp);
        
        $email=$request->email;
        $data=User::where('email','=',$request->email)->first();
        $user = Reset_password::where('user_id', $data->id)->where('otp', $otp)->orderBy('id', 'desc')->first();


        if($user->otp == $otp)
        {
            return view('mobile.vendor.reset', compact('user'));
        }
        return redirect()->back()->with('error','OTP does not match');
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
        $pending_orders = Order::where('vendor_id',AUth::user()->id)->where('status','!=',3)->where('status','!=',2)->count();
        $completed_orders = Order::where('vendor_id', Auth::user()->id)->where('status','!=',1)->where('status','!=',4)->count();
        $active_products = product::where('user_id', Auth::user()->id)->where('status', 1)->count();
        $inactive_products = product::where('user_id', Auth::user()->id)->where('status', 0)->count();
        return view('mobile.vendor.dashboard', compact('pending_orders', 'completed_orders', 'active_products', 'inactive_products'));
    }
    public function pendingorders()
    {
        
        $order_list = Order::where('vendor_id',AUth::user()->id)->where('status','!=',3)->where('status','!=',2)->orderBy('id','DESC')->get();
        // dd($order_list);
        return view('mobile.vendor.pendingorders', compact('order_list'));
    }
    public function completeorders()
    {
        $order_list = Order::where('vendor_id', Auth::user()->id)->where('status','!=',1)->where('status','!=',4)->get();
 
        return view('mobile.vendor.completeorders', compact('order_list'));
    }
    public function order_hostory()
    {
        $order_list = Order::where('user_id', Auth::user()->id)->orwhere('status',1)->orwhere('status',2)->orwhere('status',3)->orwhere('status',4)->get();
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
        return redirect()->route('vendor.account');
    }
    // analytics
    public function analytics()
    {
        $compelete_order = Order::where('user_id', Auth::user()->id)->orwhere('status',2)->count();
        $product=product::where('user_id',Auth::user()->id)->get();
        return view('mobile.vendor.analytics',compact('compelete_order','product'));
    }
    // account
    public function account()
    {
        $user = User::find(Auth::user()->id);
        return view('mobile.vendor.account', compact('user'));
    }
    // products
    public function addproducts()
    {
        $catogeries = Category::all();
        return view('mobile.vendor.addproducts', compact('catogeries'));
    }
    //store products
    public function product_store(request $request)
    {


        $request->validate(
            [

                'name'             =>      'required|string',
                'price'             =>      'required|numeric',
                'dis_price'          =>      'required|numeric',
                'description'  =>      'required|string',
                'p_image' => 'required|image',
            ]
        );

        $product = new product();
        $product->name = $request->name;
        $product->subcate_id = $request->subcate_id;
        $product->user_id =  Auth::user()->id;


        $product->description = $request->description;
        $product->price = $request->price;
        $product->Dis_price = $request->dis_price;
        $product->units = $request->units;
        $product->measurement = $request->measurement;
        $product->p_image = UploadImage('/images/product', $request->file('p_image'));
        $product->save();


        if ($request->images) {
            if (count($request->image) > 0) {

                foreach ($request->image as $image) {
                    $product_images = new product_images();
                    $product_images->product_id = $product->id;
                    $product_images->image = UploadImage('/images/product', $image);
                    $product_images->save();
                }
            }
        }
        return redirect()->route('vendor.products');
    }
    public function products()
    {
        $products = product::where('user_id', Auth::user()->id)->get();
        $user = User::all();
        return view('mobile.vendor.products', compact('products', 'user'));
    }

    public function active_product(Request $request)
    {

        $products = product::find($request->id);
        $products->status = $request->val;
        $products->save();
        return response()->json(['success' => 'Status change successfully.']);
    }

    public function inactive_product($id)
    {
        $products = product::find($id);
        $products->status = 1;
        $products->save();
        return response()->json(['success' => 'Status change successfully.']);
    }


    public function wallet()
    {
        return view('mobile.vendor.wallet');
    }
    //bank details...
    public function bankdetail(request $request)
    {  
        $bank=bank_details::where('user_id',Auth::user()->id)->first();
        
        return view('mobile.vendor.bankdetail',compact('bank'));
    }
    public function bankdetail_store(request $request)
    {
        $this->validate(
            $request,
            [
                'bank_name'       =>      'required|string|max:255',
                'act_name'       =>      'required|string|max:255',
                'act_no'         =>      'required|numeric|digits_between:8,16',
                'act_no_confirm'  =>      'required|same:act_no',
                'ifsc_code'       =>      'required|string',


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
        return view('mobile.vendor.editbankdetails',compact('bank'));
    }   
    public function bankdetail_update(request $request)
    {
        $this->validate(
            $request,
            [
                'bank_name'       =>      'required|string|max:255',
                'act_name'       =>      'required|string|max:255',
                'act_no'         =>      'required|numeric|digits_between:8,16',
                'act_no_confirm'  =>      'required|same:act_no',
                'ifsc_code'       =>      'required|string',


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

    public function orders(Request $request)
    {

        return view('mobile.vendor.orders');
    }

    public function order_detail()
    {
        $order = Order::all();
        $order_address = Order_addres::all();
        return view('mobile.vendor.order-detail', compact('order', 'order_address'));
    }

    public function order_detail_p($id)
    {    $order = Order::find($id);
        // dd($order);
        return view('mobile.vendor.order-detail-p',compact('order'));
    }
    public function order_detail_p_accepted($id)
    {
        $order=Order::find($id);
        $order->status=4;
        $order->save();
        return redirect()->back();
    }
    public function order_detail_p_deny($id)
    {
        $order=Order::find($id);
        $order->status=3;
        $order->save();
        return redirect()->back();
    }
}
