<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\GuestBook;
use App\Models\Invite;
use App\Models\Order;
use App\Models\TemplateMessage;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    
    public function indexGuestbook($event_id)
    {
        $data_guestlist = Invite::where('event_id', $event_id)->get();

        return view('admin.event.detail.guestbook', [
            'data_guestlist' => $data_guestlist
        ]);
    }

    public function editGuestBook($invoice)
    {
        $order = Order::where('invoice', $invoice)->first();
        $event = Event::where('order_id', $order->id)->with('invite')->first();
        LogActivity::addToLog('Edit halaman event ' . $event->slug, 'Akses halaman event');
        return view('admin.event.edit.guestbook', [
            'event' => $event,
        ]);
    }

    public function editSendLink($invoice)
    {
        $order = Order::where('invoice', $invoice)->first();
        $event = Event::where('order_id', $order->id)->with('invite')->first();
        LogActivity::addToLog('Edit halaman event ' . $event->slug, 'Akses halaman event');
        return view('admin.event.edit.send', [
            'event' => $event,
        ]);
    }

    public function editGreeting($invoice)
    {
        $order = Order::where('invoice', $invoice)->first();
        $event = Event::where('order_id', $order->id)->with('guests')->first();
        LogActivity::addToLog('Edit halaman event ' . $event->slug, 'Akses halaman event');
        return view('admin.event.edit.greeting', [
            'event' => $event
        ]);
    }
}
