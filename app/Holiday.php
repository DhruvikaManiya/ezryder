<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    
    protected $fillable = [
        'date','message','strore_id'
    ];

    public function store()
    {
        return $this->belongsTo('App\Store');
    }

}
