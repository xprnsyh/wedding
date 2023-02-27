<?php

namespace App\Notifications;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;

class UserInvited extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $eventupda;

    public function __construct(Event $events)
    {
        //
        $this->event = $events;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Yeay, Ada Undangan dari ' . $this->event->nama_panggilan_mempelai_wanita . ' & ' . $this->event->nama_panggilan_mempelai_pria)
            ->line('Kamu ada undangan dari ' . $this->event->nama_lengkap_mempelai_wanita . ' & ' . $this->event->nama_lengkap_mempelai_pria)
            ->line('Yuk, datang ke acara mereka pada tanggal ' . Carbon::parse($this->event->tanggal_ijab)->format('d M Y'))
            ->line('Detailnya ada link bawah ini yaa')
            ->action('Web Invitation', url('/' . $this->event->slug))
            ->line('Sebelum datang, download aplikasi HOOFEY di Play Store dulu yaa')
            ->line('Kamu tinggal scan QRCode untuk mengisi buku tamu')
            ->line('Ditunggu kehadirannya yaaa :)');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
