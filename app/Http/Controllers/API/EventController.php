<?php

namespace App\Http\Controllers\API;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Customer;
use App\Models\Event;
use App\Models\GuestBook;
use App\Models\Invite;
use App\Notifications\UndanganHadir;
use Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Notifications\UserCreated;
use App\Notifications\UserInvited;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Psr7\Response;

class EventController extends BaseController
{

    /**
     * Data semua event yang dibuat
     */
    public function getEvents()
    {
        $customer = Customer::where('email', Auth::user()->email)->first();

        $my_events = Event::where('created_by', $customer->id)->with('customer')->get();

        LogActivity::addToLog('', 'Lihat event via mobile apps');

        return response()->json($my_events);
    }
    /**
     * Detail event berdasarkan id Event
     */
    public function getDetailEvent($id)
    {
        $event = Event::find($id);
        $kalimat = 'Lihat event detail acara pernikahan ' . $event->nama_lengkap_mempelai_pria . ' dan ' . $event->nama_lengkap_mempelai_wanita;
        LogActivity::addToLog($kalimat, 'Detail event via mobile apps');
        return response()->json($event);
    }

    /**
     * Update Event berdasarkan id
     * 
     */
    public function updateDetailEvent(Request $request, $id)
    {
        $event = Event::find($id);
        $kalimat = 'Update event detail acara pernikahan ' . $event->nama_lengkap_mempelai_pria . ' dan ' . $event->nama_lengkap_mempelai_wanita;
        LogActivity::addToLog($kalimat, 'Update detail event via mobile apps');
        $event->update([
            'nama_panggilan_mempelai_pria' => $request->nama_panggilan_mempelai_pria,
            'nama_panggilan_mempelai_wanita' => $request->nama_panggilan_mempelai_wanita,
            'nama_lengkap_mempelai_pria' => $request->nama_lengkap_mempelai_pria,
            'nama_lengkap_mempelai_wanita' => $request->nama_lengkap_mempelai_wanita,
            'bio_mempelai_pria' => $request->bio_mempelai_pria,
            'bio_mempelai_wanita' => $request->bio_mempelai_wanita,
            'tanggal_ijab' => $request->tanggal_ijab,
            'tanggal_resepsi' => $request->tanggal_resepsi,
            'jam_mulai_ijab' => $request->jam_mulai_ijab,
            'jam_mulai_resepsi' => $request->jam_mulai_resepsi,
            'jam_selesai_ijab' => $request->jam_selesai_ijab,
            'jam_selesai_resepsi' => $request->jam_selesai_resepsi,
            'lokasi_ijab' => $request->lokasi_ijab,
            'lokasi_resepsi' => $request->lokasi_resepsi,
        ]);
        return response()->json($event);
    }
    /**
     * Get Data Guest
     * 
     */
    public function getGuestEvent($id)
    {
        $guest = Invite::select('invites.id as tamu_id', 'users.name', 'status')
            ->join('users', 'invites.guest_id', '=', 'users.id')
            ->where('event_id', $id)
            ->get();
        // $guest['total_hadir'] = Invite::select('invites.id as tamu_id', 'users.name', 'status')
        // ->join('users', 'invites.guest_id', '=', 'users.id')
        // ->where('event_id', $id)
        // ->where('status','Hadir')
        // ->get();

        LogActivity::addToLog('', 'List tamu event via mobile apps');


        return response()->json($guest);
    }
    /**
     * Add guest
     */
    public function addGuestEvent(Request $request, $id)
    {
        $role_customer = Role::where('name', 'customer')->first();
        $user = User::where('email', $request->email)->first();
        $invite = null;

        // jika user tidak ada
        if ($user == null) {
            // membuat user baru
            $password = Str::random(8);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($password)
            ]);
            $user->assignRole($role_customer->name);
            $user->notify(new UserCreated($request->name, $request->email, $password));
            $kalimat = $user->name . ' register';
            LogActivity::addToLog($kalimat, 'Register via undangan');
            $invite = Invite::where('event_id', $id)->where('guest_id', $user->id)->get();

            if ($invite->count() > 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data sudah ada'
                ]);
            } else {
                $new_invite = Invite::create([
                    'kode_kupon' => Str::random(7),
                    'event_id' => $id,
                    'guest_id' => $user->id,
                    'is_invited' => 1,
                    'is_confirmed' => 0,
                ]);
                $event = Event::find($id);
                $user->notify(new UserInvited($event));
                $kalimat = $user->name . ' diundang ke pernikahan' . $event->nama_lengkap_mempelai_wanita . ' & ' . $event->nama_lengkap_mempelai_pria;
                LogActivity::addToLog($kalimat, 'Undangan');
                return response()->json($new_invite);
            }
        } else {

            $invite = Invite::where('event_id', $id)->where('guest_id', $user->id)->get();

            if ($invite->count() > 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data sudah ada'
                ]);
            } else {

                $new_invite = Invite::create([
                    'kode_kupon' => Str::random(7),
                    'event_id' => $id,
                    'guest_id' => $user->id,
                    'is_invited' => 1,
                    'is_confirmed' => 0,
                ]);
                $event = Event::find($id);
                $user->notify(new UserInvited($event));
                $kalimat = $user->name . ' diundang ke pernikahan' . $event->nama_lengkap_mempelai_wanita . ' & ' . $event->nama_lengkap_mempelai_pria;
                LogActivity::addToLog($kalimat, 'Undangan');
                return response()->json($new_invite);
            }
        }
    }
    public function deleteGuest($invite_id)
    {
        $invite = Invite::find($invite_id);
        if ($invite == null) {
            return $this->sendError('Tidak ada data');
        } else {
            $invite->delete($invite);
            return response()->json($invite->select('status'));
        }
    }

    public function getInvitations()
    {
        $invitation = Invite::where('guest_id', Auth::id())
            ->join('events', 'events.id', '=', 'invites.event_id')
            ->select('events.*')
            ->orderBy('events.tanggal_ijab', 'DESC')
            ->get();
        if ($invitation == null) {
            return response()->json([
                'message' => 'Tidak ada undangan'
            ]);
        } else {
            return response()->json($invitation);
        }
    }
    public function attending($code_event)
    {
        $event = Event::where('code_event', $code_event)->first();

        $invite = Invite::where('event_id', $event->id)->where('guest_id', Auth::id())->first();
        $user = User::find(Auth::id());
        $kalimat = $user->name . 'scan QR diundang di pernikahan' . $event->nama_lengkap_mempelai_wanita . ' & ' . $event->nama_lengkap_mempelai_pria;
        LogActivity::addToLog($kalimat, 'Scan QRCode Undangan');
        $date = date("Y-m-d H:i:s");
        // data invitation sudah ada
        if ($invite != null) {
            $invite->update([
                'status' => 'Hadir',
                'is_confirmed' => 1,
                'attended_at' => $date
            ]);

            $user->notify(new UndanganHadir($event));
            return response()->json($invite);
        } else {
            $new_invite = Invite::create([
                'kode_kupon' => Str::random(7),
                'event_id' => $event->id,
                'guest_id' => Auth::id(),
                'is_invited' => 1,
                'is_confirmed' => 1,
                'status' => 'Hadir',
                'attended_at' => $date
            ]);
            $user->notify(new UndanganHadir($event));
            return response()->json($new_invite);
        }
    }
    public function sentWishes(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required|string|min:5'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages(), 'status' => 400], 200);
        }

        $event = Event::find($id);
        if ($event == null) {
            return response()->json(['errors' => 'Tidak ada data', 'status' => 404], 200);
        }
        $guest_book = GuestBook::create([
            'event_id' => $id,
            'user_id' => Auth::id(),
            'text' => $request->text
        ]);
        return response()->json($guest_book);
    }

    public function getWishes($id)
    {
        $guest_book = GuestBook::where('event_id', $id)->where('user_id', Auth::id())->get();
        return response()->json($guest_book);
    }

    public function getWishesList()
    {

        $guest_book = GuestBook::where('user_id', Auth::id())
            ->select([
                'id', 'event_id', 'user_id',
                'text', 'created_at'
            ])
            ->with(array('event' => function ($query) {
                $query->select([
                    // 'order_id',
                    'nama_panggilan_mempelai_pria', 'nama_panggilan_mempelai_wanita',
                    'nama_lengkap_mempelai_pria', 'nama_lengkap_mempelai_wanita'
                ]);
            }))
            ->orderBy('created_at', 'DESC')
            ->get();
        $guest_book = Event::join('guest_books', 'guest_books.event_id', '=', 'events.id')
            ->select(array(
                'events.id', 'events.nama_panggilan_mempelai_pria',
                'events.nama_panggilan_mempelai_wanita', 'events.nama_lengkap_mempelai_pria',
                'events.nama_lengkap_mempelai_wanita', 'guest_books.text as text',
                'guest_books.created_at'
            ))
            ->where('guest_books.user_id', Auth::id())

            ->latest('guest_books.created_at')

            ->get();

        $data = [];
        $data1 = [];

        foreach ($guest_book as $book) {
            $data2['event_id'] = $book->id;
            $data2['text'] = $book->text;
            $data2['created_at'] = Carbon::parse($book->created_at)->diffForHumans();
            $data2['event'] = [
                'nama_panggilan_mempelai_wanita' => $book->nama_panggilan_mempelai_wanita,
                'nama_panggilan_mempelai_pria' => $book->nama_panggilan_mempelai_pria,
                'nama_lengkap_mempelai_wanita' => $book->nama_lengkap_mempelai_wanita,
                'nama_lengkap_mempelai_pria' => $book->nama_lengkap_mempelai_pria,
            ];
            array_push($data1, $data2);
        }

        if (count($data1) > 0) {
            $data['status'] = 200;
            $data['data'] = $data1;
        } else {
            $data['status'] = 404;
            $data['data'] = $data1;
        }


        return response()->json($data);
    }
}
