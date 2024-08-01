<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Invite;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    public function indexGuestbook($event_id)
    {
        $data_guestlist = Invite::where('event_id', $event_id)->get();

        return view('customer.event.detail.guestbook', [
            'data_guestlist' => $data_guestlist
        ]);
    }

    public function indexSendLink($event_id)
    {
        $list_sendlink = Invite::where('event_id', $event_id)->get();

        return view('customer.event.detail.sendlink', [
            'list_sendlink' => $list_sendlink
        ]);
    }
}
