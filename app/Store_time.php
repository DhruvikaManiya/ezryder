<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store_time extends Model
{
    //

    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    
}
