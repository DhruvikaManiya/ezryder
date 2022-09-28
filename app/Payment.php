<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    public function order()
    {
        return $this->belongsTo('App\Orders','order_id','id');
    }
}
