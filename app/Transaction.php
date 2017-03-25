<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function customers()
    {
    	return $this->belongsTo('App\Customer');
    }

    public function prodTrans()
    {
    	return $this->hasMany('App\ProductTransaction');
    }
}
