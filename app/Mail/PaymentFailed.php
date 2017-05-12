<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentFailed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($obj, $customer)
    {
        $this->obj = $obj;
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.payment_fail')
        ->with(['obj' => $this->obj,
                'customer' => $this->customer])
                ->from('noreply@loomow.com')
                ->subject('Oops! Order Payment Failed');
    }
}
