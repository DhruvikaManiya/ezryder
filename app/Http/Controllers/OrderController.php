<?php

namespace App\Http\Controllers;

use App\Category;
use App\Holiday;
use App\product;
use App\product_images;
use App\Store;
use App\Store_time;
use App\User;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Use_;
use App\Order;
use App\Notification;
use App\Cart;
use App\OrderItem;

class OrderController extends Controller
{


    public function orderStore(Request $request){
            

        try {
           
            $carts = Cart::where('user_id','=',Auth::user()->id)->get();

            if($carts){


                $order = New Order;
                $order->user_id = $request->user_id;
                $order->store_id = $request->store_id;
                $order->seller_total_price = $request->seller_total_price;
                $order->seller_govt_taxes = $request->seller_govt_taxes;
                $order->seller_total_with_govt_taxes = $request->seller_total_with_govt_taxes;
                $order->admin_total_charges = $request->admin_total_charges;
                $order->net_total_price_before_tax = $request->net_total_price_before_tax;
                $order->govt_taxes = $request->govt_taxes;
                $order->net_total_price_after_tax = $request->net_total_price_after_tax;
                $order->delivery_charges = $request->delivery_charges;
                $order->packaging_charges = $request->packaging_charges;
                $order->net_total = $request->net_total;
                $order->delivery_address = $request->delivery_address;
                $order->delivery_distance_kms = $request->delivery_distance_kms;
                $order->delivery_adress_mark = $request->delivery_adress_mark;
                $order->delivery_lat = $request->delivery_lat;
                $order->delivery_long = $request->delivery_long;
                $order->save();
 
            
                foreach($carts as $cart){
                  
                    $item = new OrderItem;
                    $item->user_id = $cart->user_id;
                    $item->store_id = $request->store_id;
                    $item->order_id = $order->id;
                    $item->product_id = $cart->product->id;
                    $item->qty = $cart->quantity;
                    $item->mrp_price = $cart->product->mrp_price;
                    $item->seller_price = $cart->product->seller_price;
                    $item->admin_charges = $cart->product->admin_charge;
                    $item->pric_net_total_amout =  $cart->product->seller_price + $cart->product->seller_price*$cart->product->admin_charge/100;
                    $item->save();

                   
                }
            }
            $carts = Cart::where('user_id','=',Auth::user()->id)->delete();
            return redirect()->route('ecommerce.user-orders');
            
        } catch (Exception $e) {
            return "Plsea Re Order Place";
        }

        



    }
    public function orders($id = null){
        if($id == null)
        {
            $orders = Order::where('user_id','=',Auth::user()->id)->get();   
            return view('mobile.users.ecommerce.order', compact('orders'));
        }
        else{
            $order =  Order::find($id);
            return view('mobile.users.ecommerce.orderDetail', compact('order'));
        }
    }
    
    /*
    Order accepted or rejected by vendor
     */
    public function status_update($order_id, $status)
    {
        // die($status);

        // '0' => 'Pending',
        // '1' => 'In Progress - Vendor accepted the order',//accepted by vendor
        // '2' => 'In Progress - Delivery boy accepted the order',
        // '3' => 'Ready for Pickup',
       
        // '4' => 'Pickup Done',
        // '5' => 'Delivered',
        // '6' => 'Rejected',
        // '7' => 'Order returned',

        $order = Order::where('id', $order_id)->first();
        $order->delivery_status = $status;


        if ($status == "2") {
            $order->delivery_boy_user_id = Auth::id();
        }else {
            $order->store_user_id = Auth::id();
        }
        

        $order->save();

        $text = config('global.delivery_status')[$status] . ' #' . $order_id;
        

        // //add notification

        if ($order->user_id) {
            add_notification($order->user_id, $text);
            
        }

        if ($order->store_user_id) {
            add_notification($order->store_user_id, $text);
            
        } 

        if ($order->delivery_boy_user_id) {
            add_notification(Auth::id(), $text);
            
        }             
       
        

        

        if ($status == "2") {
            // dd($status);
            // echo "string";
           
            return redirect('/delivery/order');
        }

        if ($status == "5" || $status == "4") {
            // dd($status);
            // echo "string";
           
            return redirect('/delivery/order');
        }

        return redirect()->route('vendor.orders');

        
    }


   
}
