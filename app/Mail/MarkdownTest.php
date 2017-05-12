<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class MarkdownTest extends Mailable
{
    use Queueable, SerializesModels;

    private $customer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($f, $l)
    {
        $this->f = $f;
        $this->l = $l;
        $this->customer = Auth::guard('customer')->user();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->markdown('emails.marktest')
                    ->with(['f' => $this->f,
                            'l' => $this->l,
                            'customer' => $this->customer])
                    ->from('help@loomow.com', 'LooMow')
                    ->subject('Markdown Test');
    }
}
