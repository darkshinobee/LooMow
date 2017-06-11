<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Auth;
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
}
