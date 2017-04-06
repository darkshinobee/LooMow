<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
  use Searchable;

  public function blog()
  {
    return $this->hasMany('App\Blog');
  }

  public function product_transaction()
  {
    return $this->hasMany('App\ProductTransaction');
  }
}
