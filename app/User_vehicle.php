<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_vehicle extends Model
{
    protected $table = "user_vehicle";

    protected $fillable = ['user_id', 'vehicle_number', 'vehicle_name','vehicle_make', 'vehicle_image', 'vehicle_modal', 'vehicle_type_id', 'number_of_seats', 'distance', 'charge'];


    public function requests(){
        return $this->hasMany(Requests::class,'vehicle_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
