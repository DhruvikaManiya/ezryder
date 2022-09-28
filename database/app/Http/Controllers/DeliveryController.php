<?php

namespace App\Http\Controllers;

use App\User;
use App\DeliveryDocs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DeliveryController extends Controller
{
    public function login()
    {
        return view('mobile.delivery.login');
    }
    public function loginCheck(request $request)
    {
        $user = User::where('email', $request->email)->where('type', 3)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('delivery.order');
            }
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function register()
    {
        return view('mobile.delivery.register');
    }
    public function current_order()
    {
        return view('mobile.delivery.current_order');
    }
    public function delivery_acount()
    {
        return view('mobile.delivery.delivery_account');
    }
    public function order_history()
    {
        return view('mobile.delivery.order_history');
    }
    public function complete_delivery()
    {
        return view('mobile.delivery.complete_delivery');
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
        $data->update();
        return redirect()->route('delivery.account');
    }

    public function document()
    {   
        $document = DeliveryDocs::where('user_id', Auth::user()->id)->first();

        return view('mobile.delivery.document',compact('document'));
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



        return redirect()->route('delivery.delivery_acount');
    }


    public function order()
    {
        return view('mobile.delivery.order');
    }

    public function order_detail()
    {
        return view('mobile.delivery.order-detail');
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
}
