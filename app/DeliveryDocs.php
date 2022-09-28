<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryDocs extends Model
{
    use SoftDeletes;

    protected $table =  'delivery_boy_document';
    protected $fillable = ['user_id', 'id_front', 'id_back', 'licence_front', 'licence_back', 'vehicle_front', 'vehicle_back'];

}
