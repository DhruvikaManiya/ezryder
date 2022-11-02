<?php

namespace App\Http\Controllers;

use App\AdminSettings;
use App\brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Notificaation;
use App\product;
use App\product_images;
use App\Slider;
use App\Subcategory;
use App\Vendor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Order;
use App\StoreType;

class AdminController extends Controller
{

    public function index()
    {
        $total_users = User::count();
        $new_users = User::where('created_at', '>=', date('Y-m-d'))->count();
        $new_orders = Order::where('created_at', '>=', date('Y-m-d'))->count();

        return view('admin.dashboard', ['total_users' => $total_users, 'new_users' => $new_users, 'new_orders' => $new_orders]);
    }

    public function login()
    {
        return view('admin.login');
    }

    public function loginCheck(request $request)
    {
        $user = User::where('email', $request->email)->where('type', 1)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                // dd($user);
                Auth::login($user);
                return redirect()->route('dashboard');
            }
            return redirect()->back();
        }
        return redirect()->back();

    }
    // category
    public function category()
    {
        $categories = Category::all()->sortDesc();
        return view('admin.category.index', compact('categories'));
    }
    // category_add
    public function category_add()
    {
        $storetypes = StoreType::get();
        return view('admin.category.add',compact('storetypes'));
    }
    // category_store
    public function category_store(request $request)
    {

        // dd($request);
        $category = new Category();
        $category->name = $request->name;
        $category->type = $request->type;
        $category->description = $request->description;
        $category->image = UploadImage('/images/category', $request->file('image'));
        $category->save();
        return redirect()->route('admin.category');

    }
    // category_edit
    public function category_edit($id)
    {
        $category = Category::find($id);
        $storetypes = StoreType::get();
        return view('admin.category.edit', compact('category'))->with('storetypes',$storetypes);
    }
    // category_update
    public function category_update(request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->type = $request->type;
        $category->description = $request->description;
        if ($request->hasFile('image')) {
            $category->image = UploadImage('/images/category', $request->file('image'));
        }
        $category->save();
        return redirect()->route('admin.category');
    }
    // category_delete
    public function category_delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.category');
    }

    //sub category
    public function subcategory()
    {
        $subcategories = Subcategory::all()->sortDesc();
        return view('admin.subcategory.index', compact('subcategories'));
    }
    public function subcategory_add()
    {
        $category = Category::all();
        return view('admin.subcategory.add', compact('category'));
    }
    // subcategory_store
    public function subcategory_store(request $request)
    {
        $subcategory = new Subcategory();
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->description = $request->description;
        $subcategory->subcate_image = UploadImage('/images/subcategory', $request->file('subcate_image'));
        $subcategory->save();
        return redirect()->route('admin.subcategory');

    }
    // subcategory_edit
    public function subcategory_edit($id)
    {
        $category = Category::all();
        $subcategory = Subcategory::find($id);
        return view('admin.subcategory.edit', compact('subcategory', 'category'));
    }
    // subcategory_update
    public function subcategory_update(request $request)
    {
        $subcategory = Subcategory::find($request->id);
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->description = $request->description;
        if ($request->hasFile('subcate_image')) {
            $subcategory->subcate_image = UploadImage('/images/subcategory', $request->file('subcate_image'));
        }
        $subcategory->save();
        return redirect()->route('admin.subcategory');
    }
    // subcategory_delete
    public function subcategory_delete($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return redirect()->route('admin.subcategory');
    }

    public function get_subcategory(Request $request)
    {
        $category = Subcategory::where('category_id', $request->id)->get();
        dd($category);
        return response()->json($category);
    }

    //product
    public function product()
    {
        $product = product::orderBy('id', 'desc')->get();

        return view('admin.product.index', compact('product'));
    }
    // product_add
    public function product_add()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('admin.product.add', compact('categories', 'subcategories'));
    }
    // product_store
    public function product_store(request $request)
    {

        // dd($request);
        $product = new product;
        $product->name = $request->name;
        $product->subcate_id = $request->subcate_id;
        $product->user_id = Auth::user()->id;
        $product->description = $request->description;
        $product->MRP = $request->MRP;
        $product->Sellar_price = $request->Sellar_price;
        $product->units = $request->unit;
        $product->measurement = $request->measurement;
        $product->p_image = UploadImage('/images/product', $request->file('p_image'));
        $product->save();

        foreach ($request->image as $image) {
            $product_images = new product_images();
            $product_images->product_id = $product->id;
            $product_images->image = UploadImage('/images/product', $image);
            $product_images->save();

        }

        return redirect()->route('admin.product');

    }
    // product_edit
    public function product_edit($id)
    {
        $category = Category::all();
        $subcategory = Subcategory::all();
        $product = product::find($id);
        return view('admin.product.edit', compact('product', 'category', 'subcategory'));
    }
    // product_update
    public function product_update(request $request)
    {

        $product = product::find($request->id);
        $product->name = $request->name;
        $product->subcate_id = $request->subcate_id;
        $product->description = $request->description;
        $product->MRP = $request->MRP;
        $product->Sellar_price = $request->Sellar_price;
        $product->units = $request->units;
        $product->measurement = $request->measurement;
        $product->p_image = UploadImage('images/product', $request->file('p_image'));
        $product->save();

        foreach ($request->image as $image) {
            $product_images = new product_images();
            $product_images->product_id = $product->id;
            $product_images->image = UploadImage('/images/product', $image);
            $product_images->save();

        }

        return redirect()->route('admin.product');
    }

    public function product_delete($id)
    {
        $product = product::find($id);
        $product->delete();
        return redirect()->route('admin.product');
    }

    public function product_view($id)
    {
        $product = product::find($id);
        return view('admin.product.view', compact('product'));
    }
    public function product_approve(Request $request)
    {

        $product = product::find($request->id);
        $product->verify = 1;
        $product->status = 2;
        $product->admin_charge = $request->admin_charge;
        // $product->Sellar_price = ($product->Sellar_price + ($product->Sellar_price * $request->admin_charge)/100);
        // dd($product->Sellar_price);
        // dd($product);
       
       
        $product->save();
        // dd($product);


        $html = '<div class="notification-list_content">
                <div class="notification-list_img"> <img src="' . $product->p_image . '" alt="user" >
                </div>
                <div class="notification-list_detail">
                    <p class="text-muted">Your Product is Approved</p>
                    <p class="text-muted">' . $product->name . ' is approved by admin</p>
                    <p class="text-muted"></p>

                    <p class="text-muted"><small>Date: ' . date('d-m-Y H:i:s') . '</small></p>
                </div>
            </div>';
        $notificatin = new Notificaation();
        $notificatin->user_id = $product->user_id;
        $notificatin->title = 'Your Product is Approved';
        $notificatin->body = $html;

        $notificatin->save();
        return redirect()->back()->with('message', 'you have successfully Approve ' . $product->name);

    }
    public function product_deny($id)
    {
        $product = product::find($id);
        $product->verify = 2;
        $product->save();
        $html = '<div class="notification-list_content">
                <div class="notification-list_img"> <img src="' . $product->p_image . '" alt="user" >
                </div>
                <div class="notification-list_detail">
                    <p class="text-muted">Your Product is Deny</p>
                    <p class="text-muted">' . $product->name . ' is Deny by admin</p>
                    <p class="text-muted"></p>

                    <p class="text-muted"><small>Date: ' . date('d-m-Y H:i:s') . '</small></p>
                </div>
            </div>';
        $notificatin = new Notificaation();
        $notificatin->user_id = $product->user_id;
        $notificatin->title = 'Your Product is Deny';
        $notificatin->body = $html;

        $notificatin->save();
        return redirect()->back()->with('error', 'you have successfully Deny ' . $product->name);
    }

    public function user()
    {
        $users = User::orderBy('id', 'desc')->paginate(15);
        $title = 'All Users';
        return view('admin.user.index', compact('users', 'title'));
    }

    public function customers()
    {
        $users = User::where('type', 0)->orderBy('id', 'desc')->paginate(15);
        $title = 'Customers';
        return view('admin.user.index', compact('users', 'title'));
    }
    public function delivery()
    {
        $users = User::where('type', 3)->orderBy('id', 'desc')->paginate(15);
        $title = 'Delivery';
        return view('admin.user.index', compact('users', 'title'));
    }
    public function riders()
    {
        $users = User::where('type', 4)->orderBy('id', 'desc')->paginate(15);
        $title = 'Riders';
        return view('admin.user.index', compact('users', 'title'));
    }


    public function user_delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user');
    }
    public function user_view($id)
    {
        $user = User::find($id);
        return view('admin.user.view', compact('user'));
    }

    //brand add
    public function brand()
    {
        return view('admin.brand.add');
    }
    public function brand_store(Request $request)
    {
        $brands = new brand;
        $brands->name = $request->name;
        $brands->image = UploadImage('/images/brand', $request->file('image'));
        $brands->save();
        return view('admin.brand.add');
    }
    public function brandview()
    {
        $brands = brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    //slider
    public function slider()
    {
        $slider = Slider::all();
        return view('admin.slider.index', compact('slider'));
    }
    // slider_add
    public function slider_add()
    {
        return view('admin.slider.add');
    }
    // slider_store
    public function slider_store(request $request)
    {

        // dd($request);
        $slider = new slider();
        $slider->name = $request->name;
        $slider->type = $request->type;
        $slider->description = $request->description;
        $slider->image = UploadImage('/images/slider', $request->file('image'));
        $slider->save();
        return redirect()->route('admin.slider');

    }
    // slider_edit
    public function slider_edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }
    // slider_update
    public function slider_update(request $request)
    {
        $slider = Slider::find($request->id);
        $slider->name = $request->name;
        $slider->type = $request->type;
        $slider->description = $request->description;
        if ($request->hasFile('image')) {
            $slider->image = UploadImage('/images/slider', $request->file('image'));
        }
        $slider->save();
        return redirect()->route('admin.slider');
    }
    // slider_delete
    public function slider_delete($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->route('admin.slider');
    }

    public function approve($id)
    {
        $vendor = Vendor::find($id);
        $vendor->is_verified = 1;
        $vendor->save();
        $html = '<div class="notification-list_content">
                <div class="notification-list_img"> <img src="' . $vendor->user->profile. '" alt="user" >
                </div>
                <div class="notification-list_detail">
                    <p class="text-muted">Your Account is Approved</p>
                    <p class="text-muted">' . $vendor->user->name . ' is approved by admin</p>
                    <p class="text-muted"></p>

                    <p class="text-muted"><small>Date: ' . date('d-m-Y H:i:s') . '</small></p>
                </div>
            </div>';
        $notificatin = new Notificaation();
        $notificatin->user_id = $vendor->user_id;
        $notificatin->title = 'Your Account is Approved';
        $notificatin->body = $html;
        $notificatin->save();
        return redirect()->back()->with('message', 'you have successfully Approved ' . $vendor->name);

    // $data = array('name' => Auth::user()->name, 'email' => Auth::user()->email, 'status' => Auth::user()->status);

    // Mail::send('admin.mail', $data, function ($message) use ($data) {
    //     $message->to($data['email'], $data['name'], $data['status'])->subject('your Approvement successfully');

    //     $message->from('pankaj.bmcoder@gmail.com', 'Ezryder');
    // });
    // return redirect()->back()->with('message', 'you have successfully Approve');

    }
    public function deny($id)
    {
        $vendor = Vendor::find($id);
        $vendor->is_verified = 2;
        $vendor->save();
        $html = '<div class="notification-list_content">
                <div class="notification-list_img"> <img src="' . $vendor->user->profile. '" alt="user" >
                </div>
                <div class="notification-list_detail">
                    <p class="text-muted">Your Account is Deny</p>
                    <p class="text-muted">' . $vendor->user->name . ' is Deny by admin</p>
                    <p class="text-muted"></p>

                    <p class="text-muted"><small>Date: ' . date('d-m-Y H:i:s') . '</small></p>
                </div>
            </div>';
        $notificatin = new Notificaation();
        $notificatin->user_id = $vendor->user_id;
        $notificatin->title = 'Your Account is Deny';
        $notificatin->body = $html;
        $notificatin->save();
        return redirect()->back()->with('error', 'you have successfully Deny ' . $vendor->name);

    }

    public function setting()
    {
        $settings = AdminSettings::all();
        return view('admin.commission.index', compact('settings'));
    }

    public function setting_edit(Request $request)
    {
        $setting = AdminSettings::find($request->id);

        return view('admin.commission.edit', compact('setting'));
    }

    public function setting_update(Request $request)
    {
        $settings = AdminSettings::find($request->id);
        $settings->value = $request->value;
        $settings->description = $request->description;
        $settings->save();
        return redirect()->route('admin.setting');
    }
    // setting_search
    public function setting_search(Request $request)
    {
        $settings = AdminSettings::where('name', 'like', '%' . $request->search . '%')->get();

        return response()->json([
            'settings' => $settings,
        ]);
    }

    public function vendors()
    {
        $all = User::join('vendors', 'users.id', '=', 'vendors.user_id')
            ->select('users.*')
            ->where('users.type', 2)->orderBy('users.id', 'desc')->where('users.store_type', 1)
            ->paginate(15);

        $groceries = User::join('vendors', 'users.id', '=', 'vendors.user_id')
            ->select('users.*')
            ->where('users.type', 2)->orderBy('users.id', 'desc')->where('users.store_type', 2)
            ->paginate(15);
          

        // dd($groceries);
        $restaurants = User::join('vendors', 'users.id', '=', 'vendors.user_id')
        ->select('users.*')
        ->where('users.type', 2)->orderBy('users.id', 'desc')->where('users.store_type', 3)
        ->paginate(15);

        $pharmacies = User::join('vendors', 'users.id', '=', 'vendors.user_id')
        ->select('users.*')
        ->where('users.type', 2)->orderBy('users.id', 'desc')->where('users.store_type', 4)
        ->paginate(15);

        return view('admin.user.vendor-list', compact('all','groceries', 'restaurants', 'pharmacies'));
    }

    public function vendors_view($id)
    {
        $user = User::find($id);
        $products = Product::where('user_id', $id)->get();
        $approved_products = Product::where('user_id', $id)->where('verify', 1)->get();
        $deny_products = Product::where('user_id', $id)->where('verify', 2)->get();
        return view('admin.user.vendor-view', compact('user', 'products', 'approved_products', 'deny_products'));
    }

    public function notification()
    {

    }
}