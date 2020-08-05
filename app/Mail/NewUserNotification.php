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
    public $guard;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama, $token, $guard)
    {
        $this->nama = $nama;
        $this->token = $token;
        $this->guard = $guard;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $nama = $this->nama;
      $token = $this->token;
      $guard = $this->guard;
      return $this->from('studiotegal123@gmail.com')
      ->view('auth.email.verif-email', compact('nama', 'token', 'guard'));
    }
}
