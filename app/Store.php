<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'phone',
        'email',
        'storeman_name',
        'address',
        'city',
        'state',
        'country',
        'area',
        'lat',
        'long',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function storeType()
    {
        return $this->belongsTo('App\StoreType','store_type_id','id');
    } 

    public function products()
    {
        return $this->hasMany(product::class);
    }
    public function time()
    {
        return $this->hasMany(Store_time::class);
    }
}
