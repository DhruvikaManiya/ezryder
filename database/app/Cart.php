<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;

    // product
    public function product()
    {
        return $this->belongsTo('App\product','product_id','id');
    }
}
