<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use App\Category;
use App\product;
use App\brand;
use App\Cart;
use App\Subcategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Order;
use App\Review;
use App\Ordered_product;
use App\Order_addres;
use App\Slider;
use App\Notificaation;


class FoodController extends Controller
{
   

    // grocery
    public function food()
    {
        $categories = Category::where('type',2)->paginate(6);
        $stores=User::where('type',2)->where('store_type',2)->paginate(10);
        $wishlist=Wishlist::where('user_id',Auth::user()->id)->get();
        $slider=Slider::all();
    
        return view('mobile.food.food-home', compact('categories', 'stores','slider','wishlist'));

    }

    public function foodcategory()
    {
        // $categories = Category::all();
        // $subcategories = Subcategory::where('category_id')->get();
        $categories = Category::with('subcategory')->where('type',2)->get();
        return view('mobile.food.category', compact('categories'));
    }
    public function food_category($id)
    {   
        $sucategories = Subcategory::where('category_id',$id)->get();
        return view('mobile.food.food-category',compact('sucategories'));
    }
    public function orderdetail()
    {
        // $order=Order::all();
        // dd($order);
        $order = Order::where('user_id', Auth::user()->id)->where('type',2)->orderBy('id', 'DESC')->get();
        return view('mobile.food.orderdetail', compact('order'));
    }
    public function orderdetailp($id)
    {
        $order = Order::find($id);
        $rating = Review::find($id);
        // dd($order);
        return view('mobile.grocery.oderdetailP',compact('order','rating'));
    }

    public function sub_food_store($id)
    {
         $products = product::where('subcate_id',$id)->get();
        //  dd($products);
         return view('mobile.food.food-store',compact('products'));
    }
    public function wishlist()
    {
        $Product =Wishlist::join('products','products.id','=','wishlists.product_id')
        ->join('subcategories','subcategories.id','=','products.subcate_id')
        ->join('categories','categories.id','=','subcategories.category_id')
        ->select('wishlists.*')
        ->where('categories.type',2)
        ->where('wishlists.user_id',Auth::user()->id)
        ->get();
        return view('mobile.food.wishlist', compact('Product'));

    }
    public function store_wishlist(Request $request)
    {
       
        $count = wishlist::where('user_id', Auth::user()->id)->where('product_id', $request->id)->count();
        if ($count > 0) {
            wishlist::where('user_id', Auth::user()->id)->where('product_id', $request->id)->delete();
            return response()->json(['success' => 'Product removed from wishlist', 'status' => 'delete']);
        }
        else {

            $wishlist = new wishlist();
            $wishlist->user_id = Auth::user()->id;
            $wishlist->product_id = $request->id;
            $wishlist->save();

            return response()->json(['success' => 'Product added to wishlist', 'data' => $wishlist, 'status' => 'add','count' => $count]);
        }
    }
    public function food_store($id)
    {
        // $products = product::where('subcate_id',$id)->get();
        $products=product::join('subcategories','subcategories.id','=','products.subcate_id')
        ->join('categories','categories.id','=','subcategories.category_id')
        ->select('products.*','subcategories.name as subcategory_name','categories.name as category_name')
        ->where('categories.type',2)
        ->where('products.user_id',$id)
        ->get();
        return view('mobile.food.food-store',compact('products'));
    }
    public function productDetails($id)
    {
        $item = product::find($id);
        $products = product::where('user_id', $item->user_id)->get();
        return view('mobile.food.productdetails', compact('item', 'products'));
    }

    public function checkout()
    {
        return view('mobile.food.checkout');
    }
    public function cart()
    {
        $carts=Cart::join('products','carts.product_id','=','products.id')
        ->join('subcategories','subcategories.id','=','products.subcate_id')
        ->join('categories','categories.id','=','subcategories.category_id')
        ->select('carts.*','subcategories.name as subcategory_name','categories.name as category_name')
        ->where('categories.type',2)
        ->where('carts.user_id',Auth::user()->id)
        ->get();
        return view('mobile.food.cart', compact('carts'));
    }
    public function orderAddress(Request $request)
    {

        // dd($request->all());

        $order_type = $request->order_type;

        $carts = Cart::where('user_id', Auth::user()->id)->get();

        $arr = [];
        $total = 0;

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

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->ordered_products = json_encode($arr);
        $order->vendor_id = $cart->product->user_id;
        $order->total = $total;
      
        $order->type = 2;
        $order->save();

        return redirect()->route('mobile.food.address.page', ['order' => $order, 'order_type' => $order_type]);

    }

    public function addressPage($order, $order_type)
    {
        $order = Order::find($order);
        return view('mobile.food.orderAddress', compact('order', 'order_type'));
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

        return redirect()->route('mobile.food.payment.page', ['payment' => $order_addres]);

    }

    public function paymentpage($payment)
    {
        $order_addres = Order_addres::find($payment);

        return view('mobile.food.payment', compact('order_addres'));
    }
    public function paymentpPost(Request $request)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->delete();

        $order = Order::find($request->order_id);
        $order->status = 0;
        $order->save();
        return redirect()->route('mobile.food.order');
    }

    
     public function order(Request $request)
    {
      
    
        $order_list = Order::where('user_id', Auth::user()->id)->where('type', 2)->orderBy('id', 'DESC')->get();
        return view('mobile.grocery.order', compact('order_list'));
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
    }
    else {
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
    }
    else {

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
    }
    else {
        return response()->json([
            'success' => false,
            'message' => 'Product not added to cart',
            'data' => '',
        ], 400);
    }
}




    public function profile()
    {
        $data = User::find(Auth::user()->id);
        return view('mobile.food.profile', compact('data'));
    }
    public function profile1()
    {
        $user = User::find(Auth::user()->id);
        return view('mobile.food.profileedit', compact('user'));
    }

    public function profile_edit(request $request)
    {
        // dd($request);
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
            // [
            //     'pincode.min' => 'You have to choose the file!',
            //     'profile.size' => 'You have to choose type of the file!'
            //     // 'profile.*' => 'this is text'
            // ]
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
        return redirect()->route('mobile.food.profile1');
    }

    public function search()
    {
        return view('mobile.food.search');
    }
    public function search_qry(Request $request)
    {
        // dd($request->all());
        $search = $request->search;

        $html = '<div class="label">Store</div>';
        

        $stores = User::where('name', 'like', $search . '%')->where('type',2)->where('store_type',2)->get();
        foreach ($stores as $store) {
            $html .= '<a class="row" href="'.route('mobile.food.foodstore',$store->id).'">
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

        // $products = Product::where('name', 'like', $search . '%')->get();

        $products = product::join('subcategories','subcategories.id','=','products.subcate_id')
        ->join('categories','categories.id','=','subcategories.category_id')
        ->select('products.*','subcategories.name as subcategory_name','categories.name as category_name')
        ->where('categories.type',2)
        ->where('products.name', 'like', $search . '%')
        ->get();


        foreach ($products as $product) {
            $html .= '<a class="row"  href="' . route('mobile.food.productdetails', $product->id) . '">
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
            'data' => $html
        ], 200);
    }

    
        // public function food_cart()
        // {   
        //     $carts=Cart::join('products','carts.product_id','=','products.id')
        // ->join('subcategories','subcategories.id','=','products.subcate_id')
        // ->join('categories','categories.id','=','subcategories.category_id')
        // ->select('carts.*','subcategories.name as subcategory_name','categories.name as category_name')
        // ->where('categories.type',2)
        // ->where('carts.user_id',Auth::user()->id)
        // ->get();
        //     return view('mobile.food.cart',compact('carts'));
        // }
}
