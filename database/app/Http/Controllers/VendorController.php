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

class VendorController extends Controller
{

    public function login(request $request)
    {

        return view('mobile.vendor.login');
    }
    public function login_check(Request $request)
    {
        $user = User::where("email",$request->email)->where('type',2)->first();
        if($user)
        {
            
            if(Hash::check($request->password , $user->password))
            {
                Auth::login($user);
                return redirect()->route('vendor.dashboard');
            }
            else{
                 return redirect()->back()->with('password','Password is incorrect');   
            }
        }
        else{
            return redirect()->back()->with('email','Email is incorrect');
        }
    }
    public function register()
    {

        return view('mobile.vendor.register');
    }
    public function register_store(request $request)
    {

        // $request->validate([
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:8',
        //     'store_type' => 'required',

        // ]);
        $data = new User();
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->store_type = $request->store_type;
        $data->type = 2;
        $data->phone = $request->phone;
        $data->save();

        return redirect()->route('vendor.login');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect()->route('vendor.login');
    }

    public function home()
    {
        return view('mobile.vendor.home');
    }
    public function dashboard()
    {
        $pending_orders=Order::where('user_id',Auth::user()->id)->where('status',0)->count();
        $completed_orders=Order::where('user_id',Auth::user()->id)->where('status',1)->count();
        $active_products=product::where('user_id',Auth::user()->id)->where('status',1)->count();
        $inactive_products=product::where('user_id',Auth::user()->id)->where('status',0)->count();
        return view('mobile.vendor.dashboard',compact('pending_orders','completed_orders','active_products','inactive_products'));
    }
    public function pendingorders()
    {
        
        $order_list = Order::where('user_id',Auth::user()->id)->where('status', 0)->get();
        return view('mobile.vendor.pendingorders',compact('order_list'));
    }
    public function completeorders()
    {
        $order_list = Order::where('user_id',Auth::user()->id)->where('status', 2)->get();
        return view('mobile.vendor.completeorders',compact('order_list'));
    }

    // profile
    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('mobile.vendor.profile', compact('user'));
    }

    public function profile_edit(request $request)
    {

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
        return view('mobile.vendor.analytics');
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
        
        $user = Auth::user()->id;
        
        $product = new product();
        $product->name = $request->name;
        $product->subcate_id = $request->subcate_id;
        $product->user_id = $user;


        $product->description = $request->description;
        $product->price = $request->price;
        $product->Dis_price = $request->dis_price;
        $product->units = $request->units;
        $product->measurement = $request->measurement;
        $product->p_image = UploadImage('images/product', $request->file('p_image'));
        $product->save();
        
        
        if (count($request->image) > 0) {

            foreach ($request->image as $image) {
                $product_images = new product_images();
                $product_images->product_id = $product->id;
                $product_images->image = UploadImage('/images/product', $image);
                $product_images->save();
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
    // public function changeStatus(Request $request)
    // {
    //     $user = product::find(Auth::user()->id);
    //     $user->status = $request->status;
    //     $user->save();

    //     return response()->json(['success' => 'Status change successfully.']);
    // }
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
    public function bankdetail()
    {
        return view('mobile.vendor.bankdetail');
    }
    public function bankdetail_store(request $request)
    {
        // dd($request);
        $bank=new bank_details();
        $bank->act_name =$request->act_name;
        $bank->act_no =$request->act_no;
        $bank->user_id =Auth::user()->id;
       
        $bank->ifsc_code =$request->ifsc_code;
        $bank->save();
        // dd($bank);  
        return redirect()->route('vendor.account');

    }

    public function review()
    {
        return view('mobile.vendor.review');
    }

   public function orders(Request $request )
    {
     
        return view('mobile.vendor.orders');
    }
    public function order_detail()
    {
        $order_address=Order_addres::all();
        return view('mobile.vendor.order-detail',compact('order_address'));
    }
    // order_detail_p
    public function order_detail_p()
    {
        return view('mobile.vendor.order-detail-p');
    }
}
