<?php

namespace App\Http\Controllers;

use App\RequestAction;
use App\Requests;
use App\User;
use App\User_details;
use App\User_document;
use App\User_vehicle;
use App\Vehicle_type;
use App\VehicleCharge;
use App\VehicleMake;
use App\VehicleModel;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
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
                return redirect()->route('mobile.rider.account')->with('success', 'Registration Successful');
            } else {
                return redirect()->back()->with('error', 'Registration Failed');
            }
        } else {
            return redirect()->back()->with('email', 'Email already exist');
        }
    }

    public function book_now()
    {
        $vehicle = User_vehicle::with('user')->where('user_id', Auth::user()->id)->first();

        if(!$vehicle){
            return redirect()->route('mobile.rider.account');
        }

        $requests = Requests::where('vehicle_id', $vehicle->id)->where('status', 1)->orderBy('created_at', 'desc')->first();

        return view('mobile.rider.book-now', [
            'title' => "Book Now",
            'requests' => $requests,
        ]);
    }

    public function view_book_now($id)
    {
        try {
            $id = decrypt($id);

            $id = decrypt($id);
            $requests = Requests::with('user')
                ->where('id', $id)
                ->first();

            return view('mobile.rider.book-now-by-specific',
                [
                    "title" =>"Specific",
                    "requests" =>$requests,
                ]);

        } catch (DecryptException $e) {

            return redirect()->route('mobile.rider.book-now');

        }


    }

    public function request_acceptance(Request $request){

        $data['request_id'] = $request->request_id;

        $data['is_accept'] = $request->accept;

        if ($data['is_accept'] == 1) {

            $data['otp'] = rand(1000, 9999);

            $data['user_id'] = Auth::user()->id;

            $data['is_accept_message'] = "Your request is accepted wait for otp";

        }
        if ($data['is_accept'] == 0) {

            $data['is_accept_message'] = "Sorry your request is not accepted please try to another ride";

        }

        RequestAction::where('request_id',$request->request_id)->delete();

        $request_data['status'] = 2;

        $request_data['message'] = "Your Request has accepted wait for otp";

        Requests::where('id',$request->request_id)->update($request_data);

        RequestAction::create($data);

        return redirect()->route('mobile.rider.otp');

    }

    public function otp()
    {
        $requests = RequestAction::with('requests')->where('user_id',Auth::user()->id)->orderby('created_at','desc')->first();

        if(!$requests){

            return redirect()->route('mobile.rider.home');

        }

        return view('mobile.rider.otp',[
            'title'=>"otp",
            'requests' =>$requests
        ]);
    }
    public function verify_otp(Request $request)
    {
        $validate = $request->validate([
            'otp' => 'required'
        ]);

        $otp = RequestAction::where('user_id', Auth::user()->id)->where('otp', $request->otp)->first();

        if (!$otp) {

            return redirect()->route('mobile.rider.home');

        }

        $startTime = Carbon::parse($otp->created_at);

        $endTime = Carbon::now();

        $totalDuration = $endTime->diffInMinutes($startTime);

        if ($totalDuration < 10) {

            $request_data['status'] = 3;

            $request_data['message'] = "Your Pick has done wait for destiny";

            Requests::where('id', $otp->request_id)->update($request_data);

            return redirect()->route('mobile.rider.drop');

        } else {
            $id = $otp->request_id;

            RequestAction::where('id', $otp->id)->delete();

            return redirect()->route('mobile.rider.book-view', [encrypt($id)]);

        }


    }


    public function driver_mybooking()
    {
        return view('mobile.rider.accepting_3');
    }

    public function home()
    {
        $vehicle = User_vehicle::where('user_id', Auth::user()->id)->first();

        if(!$vehicle){
            return redirect()->route('mobile.rider.account');
        }

        $requests = Requests::with('user')->where('vehicle_id', $vehicle->id)->where('status', 1)->get();

        return view('mobile.rider.home', [
            'title' => "View Request",
            'requests' => $requests
        ]);
    }

    public function pickup()
    {
        return view('mobile.rider.pickup');
    }

    public function drop()
    {

        $requests = RequestAction::with('requests')->where('user_id',Auth::user()->id)->orderby('created_at','desc')->first();

        if(!$requests){
            return redirect()->route('mobile.rider.home');
        }

        return view('mobile.rider.drop',[
            'title' => "Drop",
            'requests' =>$requests
        ]);
    }

    public function drop_complete(Request $request){

        $request_id = $request->request_id;


        $requests = Requests::where('id',$request_id)->first();

        if(!$requests){
            return redirect()->route('mobile.rider.home');
        }

        $request_data['status'] = 4;

        $request_data['message'] = "Your Request has complete";

        Requests::where('id',$requests->id)->update($request_data);

        return redirect()->route('mobile.rider.collect');


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
        $user = User::where('id',Auth::user()->id)->first();

        return view('mobile.rider.profile', [
            'title' => "Profile",
            'user' => $user,
        ]);
    }

    public function profile_store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'phone' => 'required|digits:10',
            'address' => 'required',
            'area' => 'required',
            'city' => 'required',
            'pincode' => 'required|digits:6',
            'state' => 'required',
            'country' => 'required',
        ]);


        $profile = User::where('id',Auth::user()->id)->first();

        if(!$profile){

            User::create($validate);

        }else{

            User::where('id',Auth::user()->id)->update($validate);

        }

        return redirect()->route('mobile.rider.profile');
    }


    public function wallet()
    {
        return view('mobile.rider.wallet');
    }

    public function document()
    {
        $user_document = User_document::where('user_id',Auth::user()->id)->first();

//        echo  (isset($user_document) and $user_document->id_proof_front=="")?"T":"F";die;

        return view('mobile.rider.document',[
            'title'=>"Document",
            'document' => $user_document
        ]);
    }

    public function document_store(Request $request)
    {


        $check_detail = User_document::where('user_id', Auth::user()->id)->first();

        if (!$check_detail) {


            $validate = $request->validate([
                'id_proof_front' => 'required',
                'id_proof_back' => 'required',
                'licence_front' => 'required',
                'licence_back' => 'required',
                'vehicle_front' => 'required',
                'vehicle_back' => 'required',
            ]);

        }

        if ($request->has('id_proof_front')) {

            $extension = $request->file('id_proof_front')->getClientOriginalExtension();

            $file_name = str_replace(" ", "-", Auth::user()->name) . '-id-proof-front' . '.' . $extension;

            $request->file('id_proof_front')->storeAs('public/id-proof', $file_name);

            $validate['id_proof_front'] = $file_name;
//            storeAs('public/company-logos/'
        }

        if ($request->has('id_proof_back')) {

            $extension = $request->file('id_proof_back')->getClientOriginalExtension();

            $file_name = str_replace(" ", "-", Auth::user()->name) . '-id-proof-back' . '.' . $extension;

            $request->file('id_proof_back')->storeAs('public/id-proof', $file_name);

            $validate['id_proof_back'] = $file_name;

        }

        if ($request->has('licence_front')) {

            $extension = $request->file('licence_front')->getClientOriginalExtension();

            $file_name = str_replace(" ", "-", Auth::user()->name) . '-licence-front' . '.' . $extension;

            $request->file('licence_front')->storeAs('public/licence', $file_name);

            $validate['licence_front'] = $file_name;

        }

        if ($request->has('licence_back')) {

            $extension = $request->file('licence_back')->getClientOriginalExtension();

            $file_name = str_replace(" ", "-", Auth::user()->name) . '-licence-back' . '.' . $extension;

            $request->file('licence_back')->storeAs('public/licence', $file_name);

            $validate['licence_back'] = $file_name;

        }

        if ($request->has('vehicle_front')) {

            $extension = $request->file('vehicle_front')->getClientOriginalExtension();

            $file_name = str_replace(" ", "-", Auth::user()->name) . '-vehicle-front' . '.' . $extension;

            $request->file('vehicle_front')->storeAs('public/vehicle', $file_name);

            $validate['vehicle_front'] = $file_name;

        }

        if ($request->has('vehicle_back')) {

            $extension = $request->file('vehicle_back')->getClientOriginalExtension();

            $file_name = str_replace(" ", "-", Auth::user()->name) . '-vehicle_back' . '.' . $extension;

            $request->file('vehicle_back')->storeAs('public/vehicle', $file_name);

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
        $vehicle = User_vehicle::where('user_id', Auth::user()->id)->first();

        $type = Vehicle_type::get();

        $brand = VehicleMake::get();

        $model = VehicleModel::get();

        return view('mobile.rider.vehicle',[
            'title' => "Vehicle",
            'vehicle' => $vehicle,
            'type' => $type,
            'brand' => $brand,
            'model' => $model,
        ]);
    }


    public function get_brand(Request $request)
    {
        $type_id = $request->type_id;

        $get_brand = VehicleMake::where('vehicle_type_id',$type_id)->get();

        return response()->json($get_brand);

    }

    public function get_model(Request $request)
    {
        $brand_id = $request->brand_id;

        $get_brand = VehicleModel::where('make_id',$brand_id)->get();

        return response()->json($get_brand);

    }

    public function get_charge(Request $request)
    {
        $model_id = $request->model_id;

        $brand_id = $request->brand_id;

        $type_id = $request->type_id;

//        return $model_id."---".$brand_id."--".$type_id;

        $charge = VehicleCharge::where('make_id',$brand_id)->where('type_id',$type_id)->where('model_id',$model_id)->first();

        return response()->json($charge);


    }

   public function vehicle_store(Request $request)
    {

        $validate = $request->validate([

            'vehicle_number' => 'required',
            'vehicle_name' => 'required',
            'vehicle_make' => 'required',
            'vehicle_modal' => 'required',
            'vehicle_type_id' => 'required',
            'number_of_seats' => 'required',
            'distance' => 'required',
            'charge' => 'required'

        ]);

        $validate['user_id'] = Auth::user()->id;

        $vehicle = User_vehicle::where('user_id', Auth::user()->id)->first();

        if (!$vehicle) {

            User_vehicle::create($validate);

        } else {

            User_vehicle::where('user_id', Auth::user()->id)->update($validate);

        }

        return redirect()->route('mobile.rider.vehicle');

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
