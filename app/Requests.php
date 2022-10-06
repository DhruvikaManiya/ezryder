<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $table="requests";
    protected $fillable = ['id', 'rider_id', 'pick_address', 'drop_address', 'vehicle_id', 'distance', 'is_schedule', 'time', 'pick_time', 'drop_time', 'created_at', 'updated_at'];


    public function user(){
        return $this->belongsTo(User::class,'rider_id','id');
    }

}
