<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle_type extends Model
{
    protected $table = "vehicle_type";
    protected $fillable = ['name'];
}
