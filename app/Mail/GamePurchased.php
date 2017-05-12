<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GamePurchased extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customer, $game)
    {
      $this->customer = $customer;
      $this->game = $game;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.game_purchased')
                    ->with([
                      'customer' => $this->customer,
                      'game' => $this->game
                    ])
                    ->from('noreply@loomow.com')
                    ->subject('Congratulations! Your Game Has Been Purchased');
    }
}
