<?php

namespace App\Http\Controllers;

use App\Events\GuestBookAttending;
use App\Exports\SampleGuestListexport;
use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Imports\GuestListImport;
use App\Models\Event;
use App\Models\Invite;
use App\Models\InviteGroup;
use Dotenv\Result\Success;
use finfo;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Pusher\Pusher;
use SebastianBergmann\Environment\Console;

class GuestListController extends Controller
{
    
    
    public function import(Request $request)
    {
        try {
            Excel::import(new GuestListImport($request->event_id), $request->document_file);
            return redirect()->back()->with([
                'success' => 'Berhasil import koleksi.'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with([
                'error' => $th->getMessage()
            ]);
        }
    }

    public function sample()
    {
        return Excel::download(new SampleGuestListexport, time() . '_sample_guest_list.xls');
    }

    public function addGuest(Request $request, $slug)
    {
        $this->validate($request, [
            'name' => 'required',
            'no_hp' => 'required',
            'tipe' => 'required',
            'klasifikasi' => 'required'
        ]);

        $event = Event::where('slug', $slug)->first();
        $kode = "aD|". Str::random(15) ."|hOOfey|".$event->id;
        try {
            DB::beginTransaction();

            $invite = Invite::create([
                'name' => $request->name,
                'address' => $request->address,
                'no_hp' => $request->no_hp,
                'kode_qr' => $kode,
                'event_id' => $event->id,
                'rand_code' => Str::random(4),
                'klasifikasi' => $request->klasifikasi,
                'tipe' => $request->tipe,
                'is_confirmed' => 0,
                'is_invited' => 1,
            ]);

            DB::commit();
                

            LogActivity::addToLog('menambah tamu baru ','Akses halaman tambah tamu');

            return redirect()->back()->with([
                'success' => 'Berhasil menambah Guest'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => $th->getMessage()
            ]);
        }
       
       
        
    }

    public function editGuest(Request $request, $id)
    {
        $invite = Invite::find($id);

        return response($invite,200);
    }

    public function updateGuest(Request $request, $id)
    {
        $check_invite = Invite::find($id);

        if ($check_invite != null) {
            $check_invite->update([
                'name' => $request->name,
                'no_hp' => $request->no_hp,
                'address' => $request->address,
                'tipe' => $request->tipe,
                'klasifikasi' => $request->klasifikasi,
                'is_special' => $request->is_special,
            ]);
        } else {
            return redirect()->back()->with(['error' => "Gagal mengubah Guest"]);
        }

        return redirect()->back()->with(['success' => "Berhasil mengubah Guest"]);
        
    }

    public function deleteGuest(Request $request, $slug)
    {
        try {
            $event = Event::where('slug', $slug)->first();

            $invite = Invite::where('id', $request->id)
                ->where('event_id', $event->id)
                ->first();

            $invite->delete($invite);

            LogActivity::addToLog('menghapus tamu ','Akses halaman tambah tamu');

            return redirect()->back()->with([
                'success' => 'Berhasil menghapus Guest'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => $th->getMessage()
            ]);
        }
        
    }

    public function deleteCheck(Request $request)
    {
        $ids = explode(',', $request->id);
        $id_count = count($ids);

        for ($i=0; $i < $id_count; $i++) { 
            $invite = Invite::find($ids[$i]);

            $invite->delete($invite);
        }

        LogActivity::addToLog('menghapus tamu ','Akses halaman tambah tamu');
        
        return response()->json(['success' => true, 'message' => 'success']);
    }

    public function attending(Request $request)
    {
        $invite = Invite::where('kode_qr', $request->kode_qr)
            ->where('event_id', $request->event_id)
            ->first();
        

        $date = \Carbon\Carbon::now();
        $id_meja = $request->id_meja;

        if ($invite != null) {

            if ($invite->klasifikasi == 'Sendiri') {

                if ($invite->status == 'Hadir') {
                    return response()->json(['success' => true, 'message' => 'Terpakai', 'pesan' => $invite->name]);
                }
                $invite->update([
                    'status' => 'Hadir',
                    'is_confirmed' => 1,
                    'attended_at' => $date
                ]);

                $option = [
                    'cluster' => \config('values.cluster'),
                ];
                $pusher = new Pusher(
                    \config('values.PUSHER_APP_KEY'),
                    \config('values.PUSHER_APP_SECRET'),
                    \config('values.PUSHER_APP_ID'),
                    $option
                );

                // dd(\config('values.PUSHER_APP_KEY'));

                $data = ['name' => $invite->name, 'tipe' => $invite->tipe, 'id_meja' => $id_meja];
                
                $response = $pusher->trigger('hoofey', 'Guestbook', $data);
                
                // broadcast(new GuestBookAttending($invite->name, $invite->klasifikasi));
                // event( new GuestBookAttending($invite->name,$invite->klasifikasi));
    
                return response()->json(['success' => true, 'message' => 'Sendiri', 'pesan' => $invite->name, 'tipe' => $invite->tipe]);

            } else {
                $invite->update([
                    'status' => 'Hadir',
                    'is_confirmed' => 1,
                    'attended_at' => $date
                ]);

                return response()->json(['success' => true, 'message' => 'Group', 'pesan' => $invite->name, 'invite_id' => $invite->id, 'event_id' => $invite->event_id]);
            }

        } else {

            return response()->json(['success' => false]);
            
        }
    }

    public function attendingManual(Request $request)
    {
        $date = \Carbon\Carbon::now();

        $invite = Invite::where('id',$request->ids)
            ->first();

        $id_meja = $request->id_meja;

        if ($invite != null) {

            if ($invite->klasifikasi == 'Sendiri') {
                if ($invite->status == 'Hadir') {
                    return response()->json(['success' => true, 'message' => 'Terpakai', 'pesan' => $invite->name]);
                }
                $invite->update([
                    'status' => 'Hadir',
                    'is_confirmed' => 1,
                    'attended_at' => $date
                ]);

                $option = [
                    'cluster' => \config('values.cluster'),
                ];
                $pusher = new Pusher(
                    \config('values.PUSHER_APP_KEY'),
                    \config('values.PUSHER_APP_SECRET'),
                    \config('values.PUSHER_APP_ID'),
                    $option
                );

                // dd(\config('values.PUSHER_APP_KEY'));

                $data = ['name' => $invite->name, 'tipe' => $invite->tipe, 'id_meja' => $id_meja];
                
                $response = $pusher->trigger('hoofey', 'Guestbook', $data);

                // event( new GuestBookAttending($invite->name,$invite->klasifikasi));

                return response()->json(['success' => true, 'message' => 'Sendiri', 'pesan' => $invite->name, 'tipe' => $invite->tipe]);

            } else {
                $invite->update([
                    'status' => 'Hadir',
                    'is_confirmed' => 1,
                    'attended_at' => $date
                ]);

                return response()->json(['success' => true, 'message' => 'Group', 'pesan' => $invite->name, 'invite_id' => $invite->id, 'event_id' => $invite->event_id]);
            }

        } else {

            return response()->json(['success' => false]);
            
        }
    }

    public function attendingGroup(Request $request)
    {
        $invite = Invite::where('id',$request->invite_id)
            ->first();

        $date = \Carbon\Carbon::now();

        $id_meja = $request->id_meja;

        if ($invite != null) {
            $invite_group = InviteGroup::create([
                'name' => $request->data_group['name'],
                'address' => $request->data_group['address'],
                'no_hp' => $request->data_group['no_hp'],
                'event_id' => $request->event_id,
                'invite_id' => $request->invite_id,
                'status' => 'Hadir',
                'is_confirmed' => 1,
                'attended_at' => $date
            ]);

            $option = [
                'cluster' => \config('values.cluster'),
            ];
            $pusher = new Pusher(
                \config('values.PUSHER_APP_KEY'),
                \config('values.PUSHER_APP_SECRET'),
                \config('values.PUSHER_APP_ID'),
                $option
            );

            $data = ['name' => $invite_group->name, 'tipe' => $invite->tipe, 'id_meja' => $id_meja];
            
            $response = $pusher->trigger('hoofey', 'Guestbook', $data);

            return response()->json(['success' => true, 'pesan' => $invite_group->name]);

        } else {
            
            return response()->json(['success' => false]);
        }
    }

    public function newGuestBookManual(Request $request, $slug)
    {
        $date = \Carbon\Carbon::now();
        $check_invite = Invite::where('event_id',$request->event_id)
            ->where('name',$request->name)
            ->where('no_hp',$request->phone)
            ->get();

            if ($check_invite->count() > 0) {
                LogActivity::addToLog('Data '.$request['name'].' sudah ada', 'Menambah akun dari halaman event');
                $pesan = "Nama dan No.Hp sudah ada";
                return response()->json(['success' => false, 'message' => 'Sendiri', 'pesan' => $pesan]);
            } else {
                $new_invite = new Invite();
                $new_invite->event_id = $request->event_id;
                $new_invite->rand_code = Str::random(4);
                $new_invite->name = $request->name;
                $new_invite->address = $request->address;
                $new_invite->no_hp = "".$request->phone;
                $new_invite->klasifikasi = "Sendiri";
                $new_invite->kode_qr = "aD|". Str::random(15) ."|hOOfey|".$request->event_id;
                $new_invite->is_invited = 1;
                $new_invite->is_confirmed = 1;
                $new_invite->attended_at = $date;
                $new_invite->tipe = "Standar";
                $new_invite->status = "Hadir";
                $new_invite->save();


                $option = [
                    'cluster' => \config('values.cluster'),
                ];
                $pusher = new Pusher(
                    \config('values.PUSHER_APP_KEY'),
                    \config('values.PUSHER_APP_SECRET'),
                    \config('values.PUSHER_APP_ID'),
                    $option
                );

                $data = ['name' => $new_invite->name, 'tipe' => $new_invite->tipe, 'id_meja' => $request->id_meja];
                
                $response = $pusher->trigger('hoofey', 'Guestbook', $data);
                
                
                return response()->json(['success' => true, 'message' => 'Sendiri', 'pesan' => $new_invite->name]);
            }
            
    }

    public function indexGuestBook($slug, $id_meja)
    {
        
        $event = Event::where('slug', $slug)
            ->first();

        $invite = Invite::where('event_id', $event->id)->with('inviteGroup')->orderBy('tipe', 'desc')
            ->orderBy('name', 'asc')
            ->get();
        $all = Invite::where('event_id', $event->id)->get()->count();
        $all_group = InviteGroup::where('event_id', $event->id)->get()->count();
        $all_hadir = Invite::where('event_id', $event->id)->where('status', 'Hadir')->get()->count();
        $all_hadir_group = InviteGroup::where('event_id', $event->id)->where('status', 'Hadir')->get()->count();
        $all_vip = Invite::where('event_id', $event->id)->where('tipe', 'VIP')->where('klasifikasi', 'Sendiri')->get()->count();
        $all_vip_hadir = Invite::where('event_id', $event->id)->where('tipe', 'VIP')->where('klasifikasi', 'Sendiri')->where('status', 'Hadir')->get()->count();
        $all_umum = Invite::where('event_id', $event->id)->where('tipe', 'Standar')->where('klasifikasi', 'Sendiri')->get()->count();
        $all_umum_hadir = Invite::where('event_id', $event->id)->where('tipe', 'Standar')->where('klasifikasi', 'Sendiri')->where('status', 'Hadir')->get()->count();
        $all_vip_group = Invite::where('event_id', $event->id)->where('tipe', 'VIP')->where('klasifikasi', 'Group')->get()->count();
        $all_vip_group_hadir = Invite::where('event_id', $event->id)->where('tipe', 'VIP')->where('klasifikasi', 'Group')->where('status', 'Hadir')->get()->count();
        $all_umum_group = Invite::where('event_id', $event->id)->where('tipe', 'Standar')->where('klasifikasi', 'Group')->get()->count();
        $all_umum_group_hadir = Invite::where('event_id', $event->id)->where('tipe', 'Standar')->where('klasifikasi', 'Group')->where('status', 'Hadir')->get()->count();
        $status_undangan = 'Total Undangan : ' . $all_hadir . ' / ' . $all . '&nbsp &nbsp &nbsp VIP : ' . $all_vip_hadir . ' / ' . $all_vip .
            '&nbsp &nbsp &nbsp Umum : ' . $all_umum_hadir . ' / ' . $all_umum . '<br/> Total Orang (Group) : '. $all_hadir_group. '&nbsp &nbsp &nbsp Group VIP : ' . $all_vip_group_hadir . ' / ' . $all_vip_group .
            '&nbsp &nbsp &nbsp Group Umum : ' . $all_umum_group_hadir . ' / ' . $all_umum_group;
        $invite_group = Invite::where('event_id', $event->id)
            ->where('klasifikasi', 'Group')
            ->get();

        return view('guest.guestbook-2', [
            'invite' => $invite, 'event' => $event,
            'status_undangan' => $status_undangan,
            'id_meja' => $id_meja
        ]);
    }

    public function indexListGroup(Request $request,$id)
    {
        $event = Event::where('slug', $request['slug'])
            ->first();
        
        $invite_group = InviteGroup::where('event_id', $event->id)
            ->where('invite_id', $request['id'])
            ->get();


        return response()->json(['success' => true, 'invite_group' => $invite_group, 'event' => $event]);

    }

    public function exportPdf($id)
    {
        $invite = Invite::find($id);
        $event = Event::find($invite->event_id);
        $custom_paper = array(0,0,226.77,396.15);
        

        $data = [
            'qr_kode' => $invite->kode_qr,
            'nama_perempuan' => $event->nama_panggilan_mempelai_wanita,
            'nama_pria' => $event->nama_panggilan_mempelai_pria,
            'nama_tamu' => $invite->name,
        ];

        $pdf = PDF::loadView('export.barcodeTemplate', ['data' => $data])->setPaper($custom_paper,'potrait');

        return $pdf->stream($invite->name."_".now()->format('h:i').'.pdf');
    }

    public function exportGuestBookAttending($id)
    {
        $event = Event::find($id)->first();
        $guest_list = Invite::where('event_id', $event->id)
            ->get();

        $guest_list_pdf =PDF::loadView('export.guestbook-attending', ['event' => $event, 'guest_list' => $guest_list]);

        return $guest_list_pdf->stream();
    }

    public function exportGuestListPDF($event_id)
    {
        
    }
}
