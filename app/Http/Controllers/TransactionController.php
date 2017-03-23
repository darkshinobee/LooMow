<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Customer;
use App\Transaction;
use Session;
use Paystack;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //Validation
    // $this->validate($request, array(
    //     'reference_no' => 'required',
    //     'product_id' => 'required',
    //     'customer_id' => 'required',
    //     'status' => 'required'
    //     ));
  }

  public function getOrders()
  {

    $trans = Transaction::all();
    // $t = $trans->get('id');
    $ids = DB::table('transactions')->pluck('product_id');
    foreach ($ids as $id) {
      $prods = Product::find($id);
    }

    // $ps = $prods->where(['id'],[$t]);
    // $try = $transact->id;
    return view('customer.orders', compact('trans', 'prods'));
  }

  public function checkout($tref)
  {
    // dd($tref);
    $customer = Auth::guard('customer')->user();

    //Store To DB
    $buyCartItems = Cart::instance('buyCart')->content();

    foreach ($buyCartItems as $bc) {

      $transact = new Transaction();

      $transact->reference_no = $tref;
      $transact->quantity = $bc->qty;
      $transact->product_id = $bc->id;
      $transact->customer_id = $customer->id;
      $transact->status = "Awaiting Delivery";

      $transact->save();
    }

    Cart::instance('buyCart')->destroy();

    //Set flash message
    Session::flash('success', 'Payment Successful');

    return redirect()->action('PageController@getIndex');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
}
