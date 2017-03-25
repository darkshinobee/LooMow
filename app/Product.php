<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function blog()
    {
        return $this->hasMany('App\Blog');
    }

    public function product_transaction()
    {
    	return $this->hasMany('App\ProductTransaction');
    }
}
