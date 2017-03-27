<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LGXAdminController extends Controller
{
    public function getDashboard()
    {
      return view('admin.dashboard');
    }
}
