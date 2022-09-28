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
        return $this->belongsTo('App\category','category_id','id');
    }
}
