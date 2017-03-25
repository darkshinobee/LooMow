<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTransaction extends Model
{
    public function products()
    {
      return $this->belongsTo('App\Product');
    }

    public function transaction()
    {
      return $this->belongsTo('App\Transaction');
    }
}
