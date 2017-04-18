<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paystack;
use App\Transaction;
use App\Http\Controllers\BuyTempController;

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
    $paymentDetails = Paystack::getPaymentData();
    // dd($paymentDetails);
    $tref = $paymentDetails['data']['reference'];

    if ($paymentDetails['data']['status'] == "success") {
      return redirect()->action('TransactionController@paySuccess', $tref);
    }else {
      dd($paymentDetails);
    }

  }
}
