<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function blog()
    {
        return $this->hasMany('App\Blog');
    }

    // public function customers()
    // {
    //     return $this->belongsToMany('App\Customer', 'transactions', 'product_id', 'customer_id');
    // }

    public function transactions()
    {
    	return $this->belongsTo('App\Transaction');
    }

    // public function transactions()
    // {
    //     return $this->hasMany('App\Transaction');
    // }
}
