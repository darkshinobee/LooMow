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
    public function __construct($customer, $game, $old_voucher)
    {
      $this->customer = $customer;
      $this->game = $game;
      $this->old_voucher = $old_voucher;
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
                      'game' => $this->game,
                      'old_voucher' => $this->old_voucher
                    ])
                    ->from('noreply@loomow.com')
                    ->subject('Congratulations! Your Game Has Been Purchased');
    }
}
