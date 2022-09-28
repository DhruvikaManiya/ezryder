<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_addres extends Model
{
    public function Order()
    {
        return $this->belongsTo('App\Order','order_id','id');
    }
    public function User()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
