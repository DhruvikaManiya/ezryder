<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_document extends Model
{
   protected $table = 'user_document';

   protected $fillable = ['type', 'user_id', 'id_proof_front', 'id_proof_back', 'licence_front', 'licence_back', 'vehicle_front', 'vehicle_back'];
}
