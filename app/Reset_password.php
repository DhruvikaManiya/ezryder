<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reset_password extends Model
{

    public function user()
    {
        return  $this->belongsTo('App\User');
    }
}
