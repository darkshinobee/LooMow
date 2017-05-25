<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GameUploaded extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($upload, $customer, $tref)
    {
        $this->upload = $upload;
        $this->customer = $customer;
        $this->tref = $tref;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.uploads')
                    ->with(['upload' => $this->upload,
                            'customer' => $this->customer,
                          'tref' => $this->tref])
                    ->from('noreply@loomow.com', 'LooMow')
                    ->subject('Game Uploaded');
    }
}
