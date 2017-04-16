<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Auth;
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
  }

  public function checkout($tref)
  {
    $customer = Auth::guard('customer')->user();

    $transact = new Transaction();

    $transact->customer_id = $customer->id;
    $transact->reference_no = $tref;


    $transact->save();
    $tr_id = $transact->id;

    return redirect()->action('ProductTransactionController@store', ['id' => $tr_id]);
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
