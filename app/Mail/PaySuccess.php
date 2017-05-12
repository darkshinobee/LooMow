<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class PaySuccess extends Mailable
{
  use Queueable, SerializesModels;

  private $customer;

  /**
  * Create a new message instance.
  *
  * @return void
  */
  public function __construct($obj, $ref_no, $customer)
  {
    $this->obj = $obj;
    $this->ref_no = $ref_no;
    $this->customer = $customer;
  }

  /**
  * Build the message.
  *
  * @return $this
  */
  public function build()
  {
    return $this->markdown('emails.paysuccess')
                ->with(['obj' => $this->obj,
                        'ref_no' => $this->ref_no,
                        'customer' => $this->customer])
                ->from('orders@loomow.com', 'Loomow')
                ->subject('Your Order Has Been Received');
  }
}
