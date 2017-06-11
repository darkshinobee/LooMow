<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ProductTransactionController extends Controller
{
  public function getUploads()
  {
    $customer = Auth::guard('customer')->user();
    $p = 'products';
    $st = 'sell_transactions';

    $uploads = DB::table($p)->select($st.'.key', $st.'.status', $st.'.created_at', $st.'.updated_at',
    $p.'.title', $p.'.platform', $p.'.price', $p.'.image_path')
    ->join($st, $p.'.id', '=', $st.'.product_id')
    ->where($st.'.customer_id', $customer->id)
    ->orderBy($st.'.created_at', 'desc')
    ->paginate(6);

    return view('customer.uploads', compact('uploads'));
  }

}
