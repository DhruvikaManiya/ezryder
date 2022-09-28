<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;   
    public function subcategory()
    {
        return $this->hasMany('App\Subcategory','category_id','id');
    } 
}
