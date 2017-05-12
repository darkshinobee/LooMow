<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderSheet extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($obj, $customer, $ref_no)
    {
        $this->obj = $obj;
        $this->customer = $customer;
        $this->ref_no = $ref_no;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.order_sheet')
                    ->with([
                      'obj' => $this->obj,
                      'customer' => $this->customer,
                      'ref_no' => $this->ref_no
                    ])
                    ->from('noreply@loomow.com')
                    ->subject('Order Received');
    }
}
