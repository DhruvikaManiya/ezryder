<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;   
    public function subcategory()
    {
        return $this->hasMany('App\Subcategory','category_id','id');
    } 

    public function storeType()
    {
        return $this->belongsTo('App\StoreType','type','id');
    } 
    // product
    public function product()
    {
        return $this->hasMany('App\product','category_id','id');
    }
}
