<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Cart;
use App\product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->flag == 1) {

            $product = product::find($request->id);
            $cart = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->where('products.user_id', '!=', $product->user_id)
                ->where('carts.user_id', Auth::user()->id)
                ->where('carts.deleted_at', null)
                ->get();

            if (count($cart) == 0) {

                $cart = new Cart;
                $cart->user_id = Auth::user()->id;
                $cart->product_id = $request->id;
                $cart->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Product added to cart',
                    'data' => $cart
                ], 200);
            } else {

                return response()->json([
                    'success' => false,
                    'message' => 'You can not add product from same user',
                    'data' => '409'
                ], 200);
            }
        } else {
            $deleted = Cart::where('user_id', Auth::user()->id)->get();
            Cart::where('user_id', Auth::user()->id)->delete();

            $cart = new Cart;
            $cart->user_id = Auth::user()->id;
            $cart->product_id = $request->id;
            $cart->save();

            if ($cart) {
                return response()->json([
                    'success' => true,
                    'message' => 'delete',
                    'data' => $deleted
                ], 200);
            }
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Product added to cart',
            'data' => $cart
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function plustocart(Request $request)
    {
        $cart = Cart::find($request->id);

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart',
            'data' => $cart
        ], 200);
    }

    public function cart()
    {
        $carts = Auth::user()->id;
            $carts=Cart::join('products','carts.product_id','=','products.id')
            ->join('subcategories','subcategories.id','=','products.subcate_id')
            ->join('categories','categories.id','=','subcategories.category_id')
            ->select('products.*','subcategories.name as subcategory_name','categories.name as category_name')
            ->where('categories.type',2)
            ->get();
  
        return view('mobile.grocery.cart',compact('carts'));
    }
    public function addToCart(Request $request)
    {
        $data=new Cart();
        $data->id=$request->id;
        $data->user_id = $request->user_id;
        $data->name=$request->name;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->Dis_price=$request->Dis_price;
        $data->p_image=$request->p_image;
        $data->units=$request->units;
        $data->measurement=$request->measurement;
        $data->save();
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return redirect()->route('mobile.cart');
        
    }
}
