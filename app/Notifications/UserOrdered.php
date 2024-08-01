<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserOrdered extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $order, $orderList;
    public function __construct(Order $orders)
    {
        $this->order = $orders;
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
            ->subject('Invoice #' . $this->order->invoice . ' [PENDING]')
            ->line('Terima kasih telah melakukan pemesanan.')
            ->line('Berikut data pembelian Anda :')
            ->line('Invoice : ' . $this->order->invoice)
            ->line('Nama : ' . $this->order->customer_name)
            ->line('Tagihan : Rp ' . $this->order->subtotal)
            ->line('Silahkan lakukan pembayaran melalui rekening bank berikut :')
            ->line('Mandiri : 1340000432129 atas nama Akses Digital')
            ->action('Lihat Order Saya', url('/customer/orders'))
            ->line('Kemudian lakukan konfirmasi melalui link diatas atau bisa via WhatsApp 0812-2080-1118')
            ->action('Konfirmasi', url('/paymentpage/create'))
            ->line('Terima kasih');
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
