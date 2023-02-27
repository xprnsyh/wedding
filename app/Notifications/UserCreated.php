<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserCreated extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $name, $email, $password;
    public function __construct($name, $email, $password)
    {
        //
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
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
                    ->subject('Welcome to Hoofey!')
                    ->line('Anda telah memiliki akun di hoofey.id, berikut ini info akun Anda : ')
                    ->line('Name    : '.$this->name)
                    ->line('Email    : '.$this->email)
                    ->line('Password    : '.$this->password)
                    
                    ->action('Login', url('/login'))
                    ->line('Terima kasih telah menggunakan aplikasi kami!');
        
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
