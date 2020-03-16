<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	protected $table = 'carts';

	public function User()
	{
		return $this->belongsTo('App\User','foreign_key');
	}
	public function Product()
	{
		return $this->belongsTo('App\Product','foreign_key');
	}
}
