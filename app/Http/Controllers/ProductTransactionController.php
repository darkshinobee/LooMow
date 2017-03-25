<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\ProductTransaction;
use App\Transaction;
use App\Product;
use Illuminate\Support\Facades\DB;
use Auth;

class ProductTransactionController extends Controller
{
  public function store($tr_id)
  {
    //Store To DB
    $buyCartItems = Cart::instance('buyCart')->content();

    foreach ($buyCartItems as $bc) {

      $prodTrans = new ProductTransaction();

      $prodTrans->quantity = $bc->qty;
      $prodTrans->product_id = $bc->id;
      $prodTrans->transaction_id = $tr_id;
      $prodTrans->status = "Sold - Awaiting Delivery";
      $prodTrans->price = $bc->price * $bc->qty;

      $prodTrans->save();
    }

    Cart::instance('buyCart')->destroy();

    //Set flash message
    Session::flash('success', 'Payment Successful');

    return redirect()->action('PageController@getIndex');
  }

  public function getOrders()
  {
    $customer = Auth::guard('customer')->user();
    $p = 'products';
    $pt = 'product_transactions';
    $t = 'transactions';

    // $users = DB::table('users')->select('name', 'email as user_email')->get();

    $orders = DB::table($p)->select($t.'.reference_no', $t.'.created_at',
    $pt.'.price', $pt.'.quantity', 'title', 'platform', 'status', 'image_name')
            ->join($pt, $p.'.id', '=', $pt.'.product_id')
            ->join($t, $pt.'.transaction_id', '=', $t.'.id')
            ->where($t.'.customer_id', $customer->id)
            ->orderBy($t.'.created_at', 'desc')
            ->get();

    // dd($orders);

    return view('customer.orders', compact('orders'));
  }

}
