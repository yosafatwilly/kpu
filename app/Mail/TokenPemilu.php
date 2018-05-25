<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TokenPemilu extends Mailable {

    use Queueable,
        SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $token;
    public $pemilu;

    public function __construct($token, $pemilu) {
        $this->token = $token;
        $this->pemilu = $pemilu;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->markdown('emails')
                        ->with('token', $this->token)
                        ->with('pemilu', $this->pemilu);
    }
}
