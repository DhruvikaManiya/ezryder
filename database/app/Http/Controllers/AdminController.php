<?php

namespace App\Http\Controllers;

use App\product;
use App\brand;
use App\Category;
use App\product_images;
use App\Http\Controllers\Controller;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    
    public function index()
    {
    
        return view('admin.dashboard');
    }
    
    public function login()
    {
        return view('admin.login');
    }
    
    public function loginCheck( request $request)
    {
        $user = User::where('email',$request->email)->where('type',1)->first();
        if($user)
        {
            if(Hash::check($request->password,$user->password))
            {
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
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }
    // category_add
    public function category_add()
    {
        return view('admin.category.add');
    }
    // category_store
    public function category_store( request $request)
    {

        // dd($request);
        $category = new Category();
        $category->name = $request->name;
        $category->type = $request->type;
        $category->description = $request->description;
        $category->image = UploadImage('/images/category',$request->file('image'));
        $category->save();
        return redirect()->route('admin.category');
  
    }   
    // category_edit
    public function category_edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
    // category_update
    public function category_update( request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->type = $request->type;
        $category->description = $request->description;
        if($request->hasFile('image'))
        {
            $category->image = UploadImage('/images/category',$request->file('image'));
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
        $subcategories = Subcategory::all();
        return view('admin.subcategory.index',compact('subcategories'));
    }
    public function subcategory_add()
    {
        $category = Category::all();
        return view('admin.subcategory.add',compact('category'));
    }
    // subcategory_store
    public function subcategory_store( request $request)
    {
        $subcategory = new Subcategory();
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->description = $request->description;
        $subcategory->save();
        return redirect()->route('admin.subcategory');
  
    }   
    // subcategory_edit
    public function subcategory_edit($id)
    {
        $category=Category::all();
        $subcategory = Subcategory::find($id);
        return view('admin.subcategory.edit',compact('subcategory','category'));
    }
    // subcategory_update
    public function subcategory_update( request $request)
    {
        $subcategory = Subcategory::find($request->id);
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->description = $request->description;
       
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
        $category = Subcategory::where('category_id',$request->id)->get();
        return response()->json($category);
    }


    //product 
    public function product()
    {  
        $product = product::all();
        return view('admin.product.index',compact('product'));
    }
    // product_add
    public function product_add()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('admin.product.add',compact('categories','subcategories'));
    }
    // product_store
    public function product_store( request $request)
    {

        // dd($request);
        $product = new product;
        $product->name = $request->name;
        $product->subcate_id = $request->subcate_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->Dis_price = $request->dis_price;
        $product->units=$request->unit;
        $product->measurement=$request->measurement;
        $product->p_image = UploadImage('/images/product',$request->file('p_image'));
        $product->save();
    

        foreach($request->image as $image)
        {
            $product_images = new product_images();
            $product_images->product_id = $product->id;
            $product_images->image = UploadImage('/images/product',$image);
            $product_images->save();
       
        }
    
        return redirect()->route('admin.product');
  
    }   
    // product_edit
    public function product_edit($id)
    {
        $category=Category::all();
        $subcategory=Subcategory::all();
        $product = product::find($id);
        return view('admin.product.edit',compact('product','category','subcategory'));
    }
    // product_update
    public function product_update( request $request)
    {
            
       $product = product::find($request->id);
        $product->name = $request->name;
        $product->subcate_id = $request->subcate_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->Dis_price = $request->dis_price;
        $product->units=$request->units;
        $product->measurement=$request->measurement;
        $product->p_image = UploadImage('images/product',$request->file('p_image'));
        $product->save();
    

        foreach($request->image as $image)
        {
            $product_images = new product_images();
            $product_images->product_id = $product->id;
            $product_images->image = UploadImage('/images/product',$image);
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
    // user list
    public function user()
    {
        // dd(Auth::user());
        if(Auth::user()->type == 1)
        {
          $user = User::all();      
          $admin = User::where('type', '1')->get();   
          $vendor = User::where('type', '2')->get();   
          $delivery = User::where('type', '3')->get();   
          $rider = User::where('type', '4')->get();   
          $customer = User::where('type', '5')->get();   
        }

        return view('admin.user.index',compact('user','admin','vendor','delivery','rider','customer'));
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
        return view('admin.user.view',compact('user'));
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
        $brands->image = UploadImage('/images/brand',$request->file('image'));
        $brands->save();
        return view('admin.brand.add');
    }
    public function brandview()
    {
        $brands=brand::all();
        return view('admin.brand.index',compact('brands'));
    }
}