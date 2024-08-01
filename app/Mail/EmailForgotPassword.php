<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $forgetUrl;
    protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url,$user)
    {
        $this->forgetUrl = $url;
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
        $subject = 'Reset Password Hoofey';
        $url = \config('app.url').'/password/reset/form/'.$this->forgetUrl.'?email=' . urlencode($this->user->email);
        // $link = route('password.reset.form',['token' => $this->forgetUrl, 'email' => $this->user->email]);

        return $this->to($this->user->email)->subject($subject)->from($address, $name)->
        markdown('emails.reset-password-email',['url' => $url,'user' => $this->user]);
    }
}
