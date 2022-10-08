<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestAction extends Model
{
    protected $table="request_action";
    protected $fillable = ['request_id', 'user_id','is_accept', 'is_accept_message', 'otp'];

    public function requests(){
     return   $this->belongsTo(Requests::class,'request_id','id');
    }
}
