<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "categorys";

    public function Product()
    {
    	return $this->hasMany('App\Product');
    }
}
