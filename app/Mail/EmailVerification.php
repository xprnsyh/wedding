<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $verifyUrl;
    protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url,$user)
    {
        $this->verifyUrl = $url;
        $this->user = $user;
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
        $subject = 'Verify Email Hoofey';
        return $this->to($this->user)->subject($subject)->from($address, $name)->
        // markdown('emails.verify',['url' => $this->verifyUrl,'user' => $this->user]);
        markdown('emails.verify-email',['url' => $this->verifyUrl,'user' => $this->user]);
    }
}
