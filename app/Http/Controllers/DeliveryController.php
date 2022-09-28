<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Ordered_product;
use App\product;
use Carbon\Carbon;
use App\DeliveryDocs;
use App\Reset_password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class DeliveryController extends Controller
{
    public function login()
    {
        return view('mobile.delivery.login');
    }
    public function loginCheck(Request $request)
    {
        $user = User::where("email", $request->email)->where('type', 3)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {

                Auth::login($user);
                return redirect()->route('mobile.delivery.order');
            } else {
                return redirect()->back()->with('password', 'Password is incorrect');
            }
        } else {
            return redirect()->back()->with('email', 'Email is incorrect');
        }
    }
    public function register()
    {
        return view('mobile.delivery.register');
    }
    public function registerStore(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ],
            [
                'email.unique' => 'Email Already Exists',
            ]
        );
        $user = User::where('email', $request->email)->where('type', 3)->first();

        if (!$user) {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->type = 3;
            $user->save();
            if ($user) {
                Auth::login($user);
                return redirect()->route('mobile.delivery.order')->with('success', 'Registration Successful');
            } else {
                return redirect()->back()->with('error', 'Registration Failed');
            }
        } else {
            return redirect()->back()->with('email', 'Email already exist');
        }
    }
    public function current_order()
    {
        return view('mobile.delivery.current_order');
    }
    public function delivery_acount(request $request)
    {
        $data = User::where('id', Auth::user()->id)->first();
        return view('mobile.delivery.delivery_account', compact('data'));
    }
    public function order_history()
    {
        return view('mobile.delivery.order_history');
    }
    public function complete_delivery($id)
    {       
        $order = Order::find($id);
        return view('mobile.delivery.complete_delivery',compact('order'));
    }

    public function delivered($id)
    {
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        return redirect()->route('mobile.delivery.final_order');
    }
    public function final_order()
    {
        return view('mobile.delivery.final_order');
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('mobile.delivery.profile', compact('user'));
    }

    public function profile_edit(request $request)
    {

        $data = User::find(Auth::user()->id);
        $data->email = $request->input('email');
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
        return redirect()->route('mobile.delivery.delivery_acount');
    }

    public function profilepic(request $request)
    {
        $user = Auth::user()->id;

        $data = User::where('id', $user)->first();

        if ($data == null) {
            $data = new User;
        }
        $data->id = $user;
        if ($request->file('profile')) {

            $data->profile = UploadImage('/images/profile', $request->file('profile'));
        }

        $data->save();
        return redirect()->route('mobile.delivery.delivery_acount');
    }

    public function document()
    {
        $document = DeliveryDocs::where('user_id', Auth::user()->id)->first();

        return view('mobile.delivery.document', compact('document'));
    }

    public function documentdocs(Request $request)
    {

        $user = Auth::user()->id;


        $document = DeliveryDocs::where('user_id', $user)->first();

        if ($document == null) {
            $document = new DeliveryDocs;
        }
        $document->user_id = $user;
        if ($request->file('id_front')) {

            $document->id_front = UploadImage('/images/deliverydocs', $request->file('id_front'));
        }
        if ($request->file('id_back')) {
            $document->id_back = UploadImage('/images/deliverydocs', $request->file('id_back'));
        }
        if ($request->file('licence_front')) {
            $document->licence_front = UploadImage('/images/deliverydocs', $request->file('licence_front'));
        }
        if ($request->file('licence_back')) {
            $document->licence_back = UploadImage('/images/deliverydocs', $request->file('licence_back'));
        }
        if ($request->file('vehicle_front')) {
            $document->vehicle_front = UploadImage('/images/deliverydocs', $request->file('vehicle_front'));
        }
        if ($request->file('vehicle_back')) {
            $document->vehicle_back = UploadImage('/images/deliverydocs', $request->file('vehicle_back'));
        }

        $document->save();



        return redirect()->route('mobile.delivery.delivery_acount');
    }


    public function order()
    {
        $order = Order::all();
        return view('mobile.delivery.order', compact('order'));
    }

    public function order_detail($id)
    {

        $order = Order::find($id);
        return view('mobile.delivery.order-detail', compact('order'));
    }

    public function d_accepted($id)
    {
        $order = Order::find($id);
        $order->status = 5;
        $order->save();
        return redirect()->back();
    }
    public function reject($id)
    {
        $order = Order::find($id);
        $order->status = 3;
        $order->save();
        return redirect()->back();
    }


    public function account()
    {
        $user = User::find(Auth::user()->id);
        return view('mobile.delivery.account', compact('user'));
    }
    // wallet
    public function wallet()
    {
        return view('mobile.delivery.wallet');
    }
    // bankdetail
    public function bankdetail()
    {
        return view('mobile.delivery.bankdetail');
    }

    public function forgotPassword()
    {
        return view('mobile.delivery.forgotPassword');
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
            Mail::send('mobile.delivery.mail', $data, function ($message) use ($d) {
                $message->to($d['email'], 'Reset Password')->subject('Reset Your Password');

                $message->from('pankaj.bmcoder@gmail.com', 'Ezryder');
            });

            return view('mobile.delivery.otpverify', compact('user'));
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
            return view('mobile.delivery.reset', compact('user'));
        }
        return redirect()->back()->with('error', 'OTP does not match');
    }

    public function reset(Request $request)
    {

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->update();

        return redirect()->route('mobile.delivery.login')->with('success', 'Password Changed Successfully');
    }
}
