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
  }
}
