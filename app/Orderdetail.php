<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $table = 'orderdetails';

    public function Order()
    {
    	return $this->belongsTo('App\Order','foreign_key');
    }
    public function Product()
    {
    	return $this->belongsTo('App\Product','foreign_key');
    }
}
