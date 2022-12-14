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

    // product
    public function product()
    {
        return $this->belongsTo('App\product');
    }
}
