<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailInvoice extends Mailable
{
    use Queueable, SerializesModels;

    protected $invoiceUrl;
    public $customer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customer,$url)
    {
        $this->invoiceUrl = $url;
        $this->customer = $customer;
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
        $subject = 'Pembayaran Hoofey';
        return $this->to($this->customer->email)->subject($subject)->from($address, $name)->
        // markdown('emails.verify',['url' => $this->verifyUrl,'user' => $this->user]);
        markdown('emails.link-invoice',['url' => $this->invoiceUrl,'user' => $this->customer]);
    }
}