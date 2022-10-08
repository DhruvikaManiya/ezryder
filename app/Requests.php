<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $table = "requests";

    protected $fillable = ['id', 'rider_id', 'pick_address', 'drop_address', 'vehicle_id', 'distance', 'is_schedule', 'time', 'pick_time', 'drop_time', 'created_at', 'updated_at', 'driver_id', 'status', 'message', 'payment_status'];


    public function user(){
        return $this->belongsTo(User::class,'rider_id','id');
    }

    public function vehicle(){
        return $this->belongsTo(User_vehicle::class,'vehicle_id','id');
    }

    public function requests_action()
    {
        $this->hasMany(Requests::class);
    }

}
