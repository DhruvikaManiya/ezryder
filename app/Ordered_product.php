<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordered_product extends Model
{
  public function order()
  {
    return $this->belongsTo('App\Order','order_id','id');
  }
  public function product()
  {
      return $this->belongsTo('App\product','product_id','id');
  }
}
