<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LGXAdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('admin');
  }
    public function getDashboard()
    {
      return view('admin.dashboard');
    }

    public function addProduct()
    {
        return view('products.create');
    }
}
