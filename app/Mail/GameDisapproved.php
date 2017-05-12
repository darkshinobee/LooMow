<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GameDisapproved extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($game, $customer)
    {
      $this->game = $game;
      $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->markdown('emails.game_disapproved')
      ->with([
              'game' => $this->game,
              'customer' => $this->customer])
      ->from('returns@loomow.com')
      ->subject('Oops! Your Game Has Been Disapproved');
    }
}
