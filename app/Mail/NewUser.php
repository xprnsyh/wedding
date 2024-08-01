<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUser extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    protected $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = \config('mail.from.address');
        $name = \config('mail.from.name');
        $subject = 'Welcome To Hoofey';

        return $this->to($this->user->email)->subject($subject)->from($address, $name)->
        markdown('emails.new-user',['user' => $this->user,'password' => $this->password]);
    }
}
