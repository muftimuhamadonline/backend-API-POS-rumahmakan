<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = "products";
	public function Category()
	{
		return $this->belongsTo('App\Category','foreign_key');
	}
	public function Orderdetail()
	{
		return $this->hasMany('App\Orderdetail');
	}
}
