<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_vehicle extends Model
{
    protected $table = "user_vehicle";
    protected $fillable = ['user_id', 'vehicle_number', 'vehicle_make', 'vehicle_modal'];
}
