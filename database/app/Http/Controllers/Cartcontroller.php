<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use App\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        // $cartItems =Cart::getContent();
        $carts = Auth::user()->id;
        $carts=Cart::all();
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
