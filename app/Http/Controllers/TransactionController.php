<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Customer;
use App\Transaction;
use Session;
use Paystack;
use Gloudemans\Shoppingcart\Facades\Cart;

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

    //Store To DB
    $buyCartItems = Cart::instance('buyCart')->content();
    // $tref = Paystack::genTranxRef();

    foreach ($buyCartItems as $bc) {

      $transact = new Transaction();

      $transact->reference_no = $request->reference_no;
      $transact->description = "des";
      $transact->product_id = $bc->id;
      $transact->customer_id = $request->customer_id;
      $transact->status = "pending";

      $transact->save();
    }

    // return redirect()->action(
    //     'PaymentController@someMethod', ['id' => $id]);
    Cart::instance('buyCart')->destroy();
    return redirect()->action('PaymentController@redirectToGateway()');
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
