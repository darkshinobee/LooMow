<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paystack;
use App\Transaction;

class PaymentController extends Controller
{
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
    	return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {

    	$paymentDetails = Paystack::getPaymentData();
      dd($paymentDetails);
      $tref = $paymentDetails['data']['reference'];
      $amount = ($paymentDetails['data']['amount']) / 100;
      // dd($amount);

      if ($paymentDetails['data']['status'] == "success") {
        return redirect()->action('TransactionController@checkout', $tref);
      }else {
        dd($paymentDetails);
      }


    	// dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
        // return redirect()->action('PageController@getIndex');
        // return view('pages.about', compact('paymentDetails'));
    }
}
