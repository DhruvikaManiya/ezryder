<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'vat',
        'is_verified',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
