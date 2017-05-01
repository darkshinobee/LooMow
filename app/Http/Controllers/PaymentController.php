<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paystack;
use App\Transaction;
use App\Http\Controllers\BuyTempController;
use App\Http\Controllers\TransactionController;

class PaymentController extends Controller
{
  /**
  * Redirect the User to Paystack Payment Page
  * @return Url
  */
  public function redirectToGateway(Request $request)
  {
    $bt = new BuyTempController;

    $tempArray = array(
      'price' => $request->amount/100,
      'resultant_voucher' => $request->new_voucher
    );
    $bt->store($tempArray);

    return Paystack::getAuthorizationUrl()->redirectNow();
  }

  /**
  * Obtain Paystack payment information
  * @return void
  */
  public function handleGatewayCallback()
  {
    $tr = new TransactionController;

    $paymentDetails = Paystack::getPaymentData();
    $tref = $paymentDetails['data']['reference'];

    if ($paymentDetails['data']['status'] == "success") {
      return $tr->paySuccess($tref);
    }else {
      return $tr->payFail();
    }

  }
}
