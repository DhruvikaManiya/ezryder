<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class product extends Model
{
    public function Subcategory()
    {
        return $this->belongsTo('App\Subcategory','subcate_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    // cart
    public function cart()
    {
        return $this->hasMany('App\Cart','product_id','id')->where('user_id',auth()->user()->id);
    }
    public function category()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }
    public function Wishlist()
    {
        return $this->hasOne('App\Wishlist','product_id','id')->where('user_id',auth()->user()->id);
    }
    public function product_images()
    {
        return $this->hasMany('App\product_images','product_id');
    }

    public function store()
    {
        return $this->belongsTo('App\Store','store_id','id');
    }
}
