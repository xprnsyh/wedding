<?php

namespace App\Jobs;

use App\Mail\Newsletter as MailNewsletter;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Newsletter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $mail, $subject, $body, $latest_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mail, $subject, $body, $latest_id)
    {
        $this->latest_id = $latest_id;
        $this->mail = $mail;
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $MailNewsletters = new MailNewsletter($this->subject, $this->body);
        Mail::to($this->mail)->send($MailNewsletters);
        DB::table('failed_newsletter')->insert([
            'newsletter_id' => $this->latest_id,
            'email_sended' => $this->mail,
            'email' => null,
            'message' => 'No Error',
            'status' => 'Belum Terkirim',
        ]);
    }
    public function failed(Exception $e)
    {
        $this->newsletter = DB::table('failed_newsletter')->where('newsletter_id', $this->latest_id)->where('email', $this->mail)->value('newsletter_id');
        if (!$this->newsletter) {
            DB::table('failed_newsletter')->insert([
                'newsletter_id' => $this->latest_id,
                'email' => $this->mail,
                'message' => $e->getMessage(),
                'status' => 'Belum Terkirim',
            ]);
        }
    }
}
