<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\ProductTransactionController;
use App\Http\Controllers\SellTransactionController;

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

  public function uploadTransaction()
  {
    $customer = Auth::guard('customer')->user();

    $transact = new Transaction();
    $transact->customer_id = $customer->id;

    $st = new SellTransactionController;
    $transact->reference_no = $st->uploadRef();
    $transact->save();

    return $transact->id;
  }

  public function paySuccess($tref)
  {
    $customer = Auth::guard('customer')->user();

    $transact = new Transaction();

    $transact->customer_id = $customer->id;
    $transact->reference_no = $tref;


    $transact->save();
    $tr_id = $transact->id;

    $pt = new ProductTransactionController;
    return $pt->store($tr_id);
  }

  public function payFail()
  {
    $customer = Auth::guard('customer')->user();

    $k1 = substr($customer->first_name, -2);
    $k2 = substr($customer->last_name, -2);

    $numbers = range(0,9);
    shuffle($numbers);
    $digits= '';
    for($i = 0;$i < 9;$i++)
    {
       $digits .= $numbers[$i];
    }
     $fRef = $k1.$digits.$k2;

    $transact = new Transaction();

    $transact->customer_id = $customer->id;
    $transact->reference_no = $fRef;


    $transact->save();
    $tr_id = $transact->id;

    $pt = new ProductTransactionController;
    return $pt->storeFail($tr_id);
    // return redirect()->action('ProductTransactionController@storeFail', ['id' => $tr_id]);
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
