<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $nama;
    public $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama, $token)
    {
        $this->nama = $nama;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from('studio.musik.tegal@mail.com')
      ->view('auth.email.verif-email', compact('nama', 'token'));
    }
}
