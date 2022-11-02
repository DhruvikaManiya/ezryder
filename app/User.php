<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Vendor;
use App\Store;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','address','area','city','state','country','pincode','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function type(){
        return $this->user::whereHas('type', function($q) {
            $q->where('type', '1');
        })->get();
    }
    public function user() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }


    // products
    public function order()
    {
        return $this->belongsTo('App\Orders');
    }
    public function bank_details()
    {
        return $this->belongsTo('App\bank_details');
    }

    public function user_detail(){

        $this->hasOne(User_details::class);

    }

    public function user_vehicle(){

        $this->hasOne(User_vehicle::class);

    }

    public function store(){
       return $this->hasOne(Store::class,'user_id');
    }
    
    public function requests(){
        return $this->hasMany(Requests::class,'rider_id','id');
    }
}
