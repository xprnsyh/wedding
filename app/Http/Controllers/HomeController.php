<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Event;
use App\Models\GuestBook;
use App\Models\Invite;
use App\Models\PhotoEvent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $customers = Customer::all();
        $orders = Order::where('status', 'PENDING')->get();
        // $invitations = Invite::join('events', 'events.id', '=', 'invites.event_id')
        //     ->select('invites.kode_qr', 'events.nama_panggilan_mempelai_pria', 'events.nama_panggilan_mempelai_wanita', 
        //     'events.jam_mulai_ijab', 'events.jam_selesai_ijab', 'events.lokasi_ijab', 'events.jam_mulai_resepsi', 
        //     'events.jam_selesai_resepsi', 'events.lokasi_resepsi', 'events.slug', 'events.tanggal_ijab')
        //     ->with('events')
        //     ->get();
        $invitations = null;
        $invitations_foradmin = Event::orderBy('tanggal_ijab', 'DESC')->get();
        $my_customer = Customer::where('email', Auth::user()->email)->first();
        $events = null;
        $order_pending = [];
        if ($my_customer != null) {
            $order_pending = Order::where('status', 'PENDING')->where('customer_id', $my_customer->id)->get();
            $events = Event::where('created_by', $my_customer->id)->get();
            $invitations = Invite::join('events', 'events.id', '=', 'invites.event_id')
                ->where('events.created_by', $my_customer->id)
                ->select('invites.*', 'events.*')
                ->get();
        }
        // $guest_book = GuestBook::where('event_id', $events->id)->get();
        LogActivity::addToLog('', 'Akses halaman dashboard home');

        return view('home', [
            'users' => $users,
            'customers' => $customers,
            'orders' => $orders,
            'invitations' => $invitations,
            'invitations_foradmin' => $invitations_foradmin,
            'events' => $events,
            // 'guest_books' => $guest_book,
            'order_pending' => $order_pending
        ]);
    }

    public function profile()
    {
        $users = User::find(Auth::id());
        $my_customer = Customer::where('email', Auth::user()->email)->first();
        if ($my_customer != null) {
            $event = Event::where('created_by', $my_customer->id)->get();
        }
        $invitations = Invite::where('guest_id', Auth::id())->get();

        return view('admin.user.profile', [
            'user' => $users,
            'events' => $event,
            'invitations' => $invitations
        ]);
    }

    public function preview($invoice)
    {
        $order = Order::where('invoice', $invoice)->first();

        $event = Event::where('order_id', $order->id)->first();

        $photo_event = PhotoEvent::where('event_id', $event->id)->get()->toArray();

        switch ($event->template) {
            case 'Gold':
                return view('guest.preview-gold', [
                    'event' => $event,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Soft':
                return view('guest.preview-soft', [
                    'event' => $event,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Prime':
                return view('guest.preview-prime', [
                    'event' => $event,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Silver':
                return view('guest.preview-silver', [
                    'event' => $event,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Chocolate':
                return view('guest.preview-choco', [
                    'event' => $event,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Pink':
                return view('guest.preview-pink', [
                    'event' => $event,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Crystal':
                return view('guest.preview-crystal', [
                    'event' => $event,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Grey':
                return view('guest.preview-grey', [
                    'event' => $event,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Bronze':
                return view('guest.preview-bronze', [
                    'event' => $event,
                    'photo_event' => $photo_event
                ]);
                break;
        }
    }
}
