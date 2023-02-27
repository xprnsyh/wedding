<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DaftarUser extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $password)
    {
        //
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hello@hoofey.id')
            ->subject('Welcome to Hoofey.id')
            ->view('email.register')
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
            ]);
    }
}
