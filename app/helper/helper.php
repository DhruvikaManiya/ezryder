<?php 

use App\Notification;

function UploadImage($path,$file)
{
    $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
    $imageName = $filename.rand(1000,99999).time().'.'.$file->getClientOriginalExtension();
    $file->move(base_path().'/public'.$path,$imageName);
    return $path.'/'.$imageName;
}

function getDay($numOfDay)
{
    if($numOfDay > 7)
    {
        return 'Something worng';
    }
    $days = [
        1 => 'Monday',
        2 => 'Tuesday',
        3 => 'Wednesday',
        4 => 'Thursday',
        5 => 'Friday',
        6 => 'Saturday',
        7 => 'Sunday',
    ];

    return $days[$numOfDay];
}

function getDisplayPrice($admin_per,$sell_price){
    $amount = $sell_price * $admin_per/100; 
    return $sell_price+$amount;

}

function getofferPersentage($price,$mrp){
   $per =  $price/$mrp*100;
   return 100-$per;

}


function checkCartInProduct($productId){
    $userId = Auth::user()->id;

    $cart = DB::table('carts')->where('user_id','=',$userId)
    ->where('product_id',$productId)->first();
    
    if($cart){
        return $cart->quantity;
    }else{
        return 0;
    }

}

function cartCount(){
    $userId = Auth::user()->id;

    $cart = DB::table('carts')->where('user_id','=',$userId)->count();
    
    return  $cart;

}


function getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'miles') {
  $theta = $longitude1 - $longitude2; 
  $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
  $distance = acos($distance); 
  $distance = rad2deg($distance); 
  $distance = $distance * 60 * 1.1515; 
  switch($unit) { 
    case 'miles': 
      break; 
    case 'kilometers' : 
      $distance = $distance * 1.609344; 
  } 
  return (round($distance,2)); 
}


function add_notification($user_id, $text){
        $notification = new Notification;
        $notification->user_id = $user_id;
        $notification->body = $text;
        $notification->save();

}


function checkStore($store_id){
        $cart = DB::table('carts')->where('user_id','=',Auth::user())
    ->where('store_id',$store_id)->count();
}





?>