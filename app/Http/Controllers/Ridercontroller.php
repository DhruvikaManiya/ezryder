<?php

namespace App\Http\Controllers;

use App\User;
use App\User_document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Ridercontroller extends Controller
{
    public function login()
    {
        return view('mobile.rider.login');
    }

    // loginCheck
    public function loginCheck(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->where('type', 4)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {

                Auth::login($user);

                return redirect()->route('mobile.rider.account');
            } else {
                return redirect()->back()->with('error', 'Password is incorrect');
            }
        } else {
            return redirect()->back()->with('error', 'Email is incorrect');
        }
    }

    public function register()
    {
        return view('mobile.rider.register');
    }

    public function registerStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required|numeric|unique:users|digits:10',
            'confirm_password' => 'required|same:password',
        ]);
        $user = User::where('email', $request->email)->where('type', 4)->first();

        if (!$user) {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->type = 4;
            $user->save();
            if ($user) {
                Auth::login($user);
                return redirect()->route('mobile.rider.book-now')->with('success', 'Registration Successful');
            } else {
                return redirect()->back()->with('error', 'Registration Failed');
            }
        } else {
            return redirect()->back()->with('email', 'Email already exist');
        }
    }

    public function book_now()
    {
        return view('mobile.rider.book-now');
    }

    public function otp()
    {
        return view('mobile.rider.otp');
    }

    public function driver_mybooking()
    {
        return view('mobile.rider.accepting_3');
    }

    public function home()
    {
        return view('mobile.rider.home');
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

    public function rider()
    {
        return view('mobile.rider.home');
    }

    public function homenow()
    {
        return view('mobile.rider.home-now');
    }

    public function payment()
    {
        return view('mobile.rider.rider-payment');
    }

    public function my_booking()
    {
        return view('mobile.rider.my-booking');
    }

    public function booking_details()
    {
        return view('mobile.rider.rider-booking-details');
    }

    // account
    public function account()
    {
        return view('mobile.rider.account');
    }

    public function profile()
    {
        return view('mobile.rider.profile');
    }

    public function wallet()
    {
        return view('mobile.rider.wallet');
    }

    public function document()
    {
        $user_document = User_document::where('user_id',Auth::user()->id)->first();
        return view('mobile.rider.document',[
            'title'=>"Document",
            'document' => $user_document
        ]);
    }

    public function document_store(Request $request)
    {

        $validate = $request->validate([
            'id_proof_front' => 'required',
            'id_proof_back' => 'required',
            'licence_front' => 'required',
            'licence_back' => 'required',
            'vehicle_front' => 'required',
            'vehicle_back' => 'required',
        ]);

        if ($request->has('id_proof_front')) {

            $extension = $request->file('id_proof_front')->getClientOriginalExtension();

            $file_name = str_replace(" ", "-", Auth::user()->name) . '-id-proof-front' . '.' . $extension;

            $request->file('id_proof_front')->storeAs('id-proof', $file_name);

            $validate['id_proof_front'] = $file_name;

        }

        if ($request->has('id_proof_back')) {

            $extension = $request->file('id_proof_back')->getClientOriginalExtension();

            $file_name = str_replace(" ", "-", Auth::user()->name) . '-id-proof-back' . '.' . $extension;

            $request->file('id_proof_back')->storeAs('id-proof', $file_name);

            $validate['id_proof_back'] = $file_name;

        }

        if ($request->has('licence_front')) {

            $extension = $request->file('licence_front')->getClientOriginalExtension();

            $file_name = str_replace(" ", "-", Auth::user()->name) . '-licence-front' . '.' . $extension;

            $request->file('licence_front')->storeAs('licence', $file_name);

            $validate['licence_front'] = $file_name;

        }

        if ($request->has('licence_back')) {

            $extension = $request->file('licence_back')->getClientOriginalExtension();

            $file_name = str_replace(" ", "-", Auth::user()->name) . '-licence-back' . '.' . $extension;

            $request->file('licence_back')->storeAs('licence', $file_name);

            $validate['licence_back'] = $file_name;

        }
        if ($request->has('vehicle_front')) {

            $extension = $request->file('vehicle_front')->getClientOriginalExtension();

            $file_name = str_replace(" ", "-", Auth::user()->name) . '-vehicle-front' . '.' . $extension;

            $request->file('vehicle_front')->storeAs('vehicle', $file_name);

            $validate['vehicle_front'] = $file_name;

        }

        if ($request->has('vehicle_back')) {

            $extension = $request->file('vehicle_back')->getClientOriginalExtension();

            $file_name = str_replace(" ", "-", Auth::user()->name) . '-vehicle_back' . '.' . $extension;

            $request->file('vehicle_back')->storeAs('vehicle', $file_name);

            $validate['vehicle_back'] = $file_name;

        }

        $validate['type'] = 1;

        $check_detail = User_document::where('user_id', Auth::user()->id)->first();

        if (!$check_detail) {

            $validate['user_id'] = Auth::user()->id;

            User_document::create($validate);

        } else {

            User_document::where('user_id', Auth::user()->id)->update($validate);

        }

        return redirect()->route('mobile.rider.document');

    }

    public function vehicle()
    {
        return view('mobile.rider.vehicle');
    }


    public function direction()
    {
        return view('mobile.rider.direction');
    }

    // logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('mobile.rider.login');
    }
}
