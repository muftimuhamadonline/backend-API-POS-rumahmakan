<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	public function User()
	{
		return $this->belongsTo('App\User','foreign_key');
	}
	public function Orderdetail()
	{
		return $this->hasMany('App\Orderdetail');
	}
}
