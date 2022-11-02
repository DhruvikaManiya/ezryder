<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'product_id', 'quantity', 'status',
    ];
    //user
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function store()
    {
        return $this->belongsTo('App\Store','store_id');
    }

    // product
    public function order_addres()
    {
        return $this->hasOne('App\Order_addres','order_id');
    }
    public function payment()
    {
        return $this->hasOne('App\Payment','order_id');
    }
    // public function ordered_product()
    // {
    //     return $this->hasOne('App\Ordered_product','id','order_id');
    // }
    // public function ordered_products()
    // {
    //     return $this->hasOne('App\ordered_products','order_id');
    // }
    public function orderItems()
    {
        return $this->hasMany('App\OrderItem','order_id');
    }
}
