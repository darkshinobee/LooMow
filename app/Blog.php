<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    // public function customers()
    // {
    // 	return $this->belongsTo('App\Customer');
    // }

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
