<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoEventRequest;
use App\Models\Audio;
use App\Models\Customer;
use App\Models\Event;
use App\Models\GuestBook;
use App\Models\Order;
use App\Models\PhotoEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use PDF;
use Image;
use SebastianBergmann\Environment\Console;
use App\Helpers\LogActivity;
use App\Models\Invite;
use App\Models\TemplateList;
use App\Models\TemplateMessage;

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::all();
        LogActivity::addToLog('', 'Akses halaman event');
        return view('admin.event.index', [
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $orders = Order::where('status', 'SUCCESS')->orderBy('created_at', 'ASC')->get();
        LogActivity::addToLog('', 'Akses halaman membuat event');
        $audio = Audio::all();
        $list_templates = TemplateList::all();
        return view('admin.event.create', [
            'orders' => $orders,
            'audio' => $audio,
            'list_templates' => $list_templates
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'order_id' => 'required|unique:events',
            'template' => 'required',
            'nama_panggilan_mempelai_pria' => 'required',
            'nama_panggilan_mempelai_wanita' => 'required',
            'nama_lengkap_mempelai_pria' => 'required',
            'nama_lengkap_mempelai_wanita' => 'required',
            'bio_mempelai_pria' => 'required',
            'bio_mempelai_wanita' => 'required',
            'tanggal_ijab' => 'required',
            'tanggal_resepsi' => 'required',
            'jam_mulai_ijab' => 'required',
            'jam_mulai_resepsi' => 'required',
            'jam_selesai_ijab' => 'required',
            'jam_selesai_resepsi' => 'required',
            'lokasi_ijab' => 'required',
            'lokasi_resepsi' => 'required',
            'avatar_pria' => 'image|file|mimes:jpg,png,jpeg|max:10000',
            'avatar_wanita' => 'image|file|mimes:jpg,png,jpeg|max:10000',
            'gm_ijab' => 'required|url',
            'gm_resepsi' => 'required|url',
            'logo' => 'image|file|mimes:jpg,png,jpeg|max:10000'
        ]);
        $order = Order::find($request->order_id);
        $customer = Customer::where('id', $order->customer_id)->first();
        $str_pria = strtolower($request->nama_panggilan_mempelai_pria);
        $str_wanita = strtolower($request->nama_panggilan_mempelai_wanita);
        $slug = $str_pria . '-' . $str_wanita;
        if ($order->status != 'SUCCESS') {
            LogActivity::addToLog('Status order belum berhasil! Selesaikan pembayaran terlebih dahulu!', 'Akses halaman event');
            return redirect()->back()->with(['error' => 'Status order belum berhasil! Selesaikan pembayaran terlebih dahulu!']);
        } else {
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $foldercheck = public_path() . '/admin/assets/images/events/' . $order->invoice;
                $filename = Str::slug($request->name) . '_' . time() . '.' . 'WebP';
                if (!is_dir($foldercheck)) {
                    mkdir($foldercheck,0777,true);
                }
                if (File::exists($logo)) {
                    $img = Image::make($logo);
                    $img->resize(380, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save('admin/assets/images/events/'. $order->invoice . '/' . $filename, 80, 'WebP');
                    File::delete($logo);
                    LogActivity::addToLog('Upload logo', 'Akses halaman event');
                }
            } else {
                $filename = '';
            }
            if ($request->image_pria != null) {
                
                $avatar_pria = $request->image_pria;
                $foldercheck = public_path() . '/admin/assets/images/pria/'. $order->invoice;
                if (!is_dir($foldercheck)) {
                    mkdir($foldercheck,0777,true);
                }

                list($type, $avatar_pria) = explode(';', $avatar_pria);
                list(, $avatar_pria)      = explode(',', $avatar_pria);
                $avatar_pria = base64_decode($avatar_pria);
                $avatar_pria = Image::make($avatar_pria);

                // $extension = $request->avatar_pria->getClientOriginalExtension();
                $file_avatar_pria = Str::slug($request->nama_lengkap_mempelai_pria) . '_' . time() . '.' . 'WebP';
                $path = public_path() . '/admin/assets/images/pria/' . $order->invoice . '/'.$file_avatar_pria;
                // file_put_contents($path, $avatar_pria);
                $avatar_pria->save('admin/assets/images/pria/'. $order->invoice . '/' . $file_avatar_pria, 80, 'WebP');
            } else {
                $file_avatar_pria = '';
            }
            if ($request->image_wanita != null) {
                $avatar_wanita = $request->image_wanita;
                $foldercheck = public_path() . '/admin/assets/images/wanita/'. $order->invoice;
                if (!is_dir($foldercheck)) {
                    mkdir($foldercheck,0777,true);
                }
                list($type, $avatar_wanita) = explode(';', $avatar_wanita);
                list(, $avatar_wanita)      = explode(',', $avatar_wanita);
                $avatar_wanita = base64_decode($avatar_wanita);
                $avatar_wanita = Image::make($avatar_wanita);
                // $extension = $request->avatar_pria->getClientOriginalExtension();
                $file_avatar_wanita = Str::slug($request->nama_lengkap_mempelai_wanita) . '_' . time() . '.' . 'WebP';
                $path = public_path() . '/admin/assets/images/wanita/' . $order->invoice . '/'.$file_avatar_wanita;
                // file_put_contents($path, $avatar_pria);
                $avatar_wanita->save('admin/assets/images/wanita/'. $order->invoice . '/' . $file_avatar_wanita, 80, 'WebP');
            } else {
                $file_avatar_wanita = '';
            }
            $events = Event::create([
                'order_id' => $request->order_id,
                'code_event' => Str::random(9),
                'slug' => $slug,
                'template' => $request->template,
                'link_livestreaming' => $request->link_livestreaming,
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
                'gm_ijab' => $request->gm_ijab,
                'gm_resepsi' => $request->gm_resepsi,
                'link_youtube' => $request->link_youtube,
                'yt_title' => $request->yt_title,
                'yt_desc' => $request->yt_desc,
                'logo_req' => $filename,
                'avatar_pria' => $file_avatar_pria,
                'avatar_wanita' => $file_avatar_wanita,
                'created_by' => $customer->id,
                'audio_id' => $request->audio_id,
                'monitor' => $request->monitor,
            ]);
            $event_id = DB::table('events')->select('id')->where('order_id', $request->order_id)->first();

            DB::table('hero_section')->insert([
                'event_id' => $event_id->id,
                'teks_judul' => $request->nama_panggilan_mempelai_pria . ' & ' . $request->nama_panggilan_mempelai_wanita,
                'teks_atas' => 'Hadiri Pernikahan',
                'teks_bawah' => 'Pada tanggal:',
                'perataan' => 'text-center',
                'container' => 'container',
            ]);

            DB::table('invitation_section')->insert([
                'event_id' => $event_id->id,
                'teks_atas' => 'Halo,',
                'teks_tengah' => 'Nama Tamu',
                'teks_bawah' => 'Kamu diundang keacara pernikahan ' . $request->nama_panggilan_mempelai_pria . ' & ' . $request->nama_panggilan_mempelai_wanita,
                'perataan' => 'text-center',
                'container' => 'container',
            ]);

            DB::table('countdown_section')->insert([
                'event_id' => $event_id->id,
                'background' => NULL,
            ]);

            DB::table('maps_section')->insert([
                'event_id' => $event_id->id,
                'teks_atas' => 'Lokasi Pernikahan',
                'teks_bawah' => 'Berikut lokasi pernikahan kami',
                'iframe_maps' => $request->gm_ijab
            ]);

            DB::table('streaming_section')->insert([
                'event_id' => $event_id->id,
                'teks_atas' => 'Live Streaming',
                'teks_bawah' => 'Berikut link streaming pernikahan kami',
                'iframe_streaming' => $request->link_livestreaming,
            ]);

            DB::table('gallery_section')->insert([
                'event_id' => $event_id->id,
                'teks_atas' => 'Gallery',
                'teks_bawah' => 'Berikut momen kami',
            ]);

            DB::table('videos_section')->insert([
                'event_id' => $event_id->id,
                'teks_atas' => 'Wedding Videos',
                'teks_bawah' => 'Lihat momen kami dalam bentuk video',
                'iframe_videos' => $request->link_youtube,
            ]);

            DB::table('event_section')->insert([
                'event_id' => $event_id->id,
                'background' => NULL,
                'teks_atas' => 'Jadwal Pernikahan',
                'teks_bawah' => 'Berikut jadwal pernikahan kami',
            ]);

            DB::table('comment_section')->insert([
                'event_id' => $event_id->id,
                'teks_atas' => 'Comments',
                'teks_bawah' => 'Ucapan teman-teman kamu',
            ]);

            DB::table('footer_section')->insert([
                'event_id' => $event_id->id,
                'teks_atas' => 'Mohon doa Restu',
                'teks_bawah' => $request->nama_panggilan_mempelai_pria . ' & ' . $request->nama_panggilan_mempelai_wanita,
            ]);

            // } else {
            //     $events = Event::create([
            //         'order_id' => $request->order_id,
            //         'code_event' => Str::random(9),
            //         'slug' => $slug,
            //         'template' => $request->template,
            //         'link_livestreaming' => $request->link_livestreaming,
            //         'nama_panggilan_mempelai_pria' => $request->nama_panggilan_mempelai_pria,
            //         'nama_panggilan_mempelai_wanita' => $request->nama_panggilan_mempelai_wanita,
            //         'nama_lengkap_mempelai_pria' => $request->nama_lengkap_mempelai_pria,
            //         'nama_lengkap_mempelai_wanita' => $request->nama_lengkap_mempelai_wanita,
            //         'bio_mempelai_pria' => $request->bio_mempelai_pria,
            //         'bio_mempelai_wanita' => $request->bio_mempelai_wanita,
            //         'tanggal_ijab' => $request->tanggal_ijab,
            //         'tanggal_resepsi' => $request->tanggal_resepsi,
            //         'jam_mulai_ijab' => $request->jam_mulai_ijab,
            //         'jam_mulai_resepsi' => $request->jam_mulai_resepsi,
            //         'jam_selesai_ijab' => $request->jam_selesai_ijab,
            //         'jam_selesai_resepsi' => $request->jam_selesai_resepsi,
            //         'lokasi_ijab' => $request->lokasi_ijab,
            //         'lokasi_resepsi' => $request->lokasi_resepsi,
            //         'gm_ijab' => $request->gm_ijab,
            //         'link_youtube' => $request->link_youtube,
            //         'yt_title' => $request->yt_title,
            //         'yt_desc' => $request->yt_desc,
            //         'created_by' => $customer->id,
            //         'audio_id' => $request->audio_id,
            //     ]);
            // }

            return redirect()->route('admin.list.event')->with(['success' => 'Event berhasil dibuat']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($invoice)
    {
        //
        $order = Order::where('invoice', $invoice)->first();
        $orders = Order::all();
        $event = Event::where('order_id', $order->id)->with('guests')->first();

        return view('admin.event.show', [
            'event' => $event,
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($invoice)
    {
        //
        $order = Order::where('invoice', $invoice)->first();
        $orders = Order::all();
        $event = Event::where('order_id', $order->id)->with('photos', 'invite')->first();
        $data_guestbook = GuestBook::where('event_id', $event->id)
        ->get();
        $data_audio = Audio::orderBy('name', 'ASC')->get();
        $list_templates = TemplateList::all();
        LogActivity::addToLog('Edit halaman event ' . $event->slug, 'Akses halaman event');
        return view('admin.event.edit.data', [
            'event' => $event,
            'orders' => $orders,
            'data_audio' => $data_audio,
            'data_guestbook' => $data_guestbook,
            'list_templates' => $list_templates,
        ]);
    }
    
    // EDIT yg BARU untuk tab data

    // public function edit($invoice)
    // {
    //     $order = Order::where('invoice', $invoice)->first();
    //     $orders = Order::all();
    //     $event = Event::where('order_id', $order->id)->first();
    //     $data_audio = Audio::orderBy('name', 'ASC')->get();
    //     $list_templates = TemplateList::all();
    //     LogActivity::addToLog('Edit halaman event ' . $event->slug, 'Akses halaman event');
    //     return view('admin.event.edit', [
    //         'event' => $event,
    //         'orders' => $orders,
    //         'data_audio' => $data_audio,
    //         'list_templates' => $list_templates,
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'order_id' => 'required',
            'template' => 'required',
            'nama_panggilan_mempelai_pria' => 'required',
            'nama_panggilan_mempelai_wanita' => 'required',
            'nama_lengkap_mempelai_pria' => 'required',
            'nama_lengkap_mempelai_wanita' => 'required',
            'bio_mempelai_pria' => 'required',
            'bio_mempelai_wanita' => 'required',
            'tanggal_ijab' => 'required',
            'tanggal_resepsi' => 'required',
            'jam_mulai_ijab' => 'required',
            'jam_mulai_resepsi' => 'required',
            'jam_selesai_ijab' => 'required',
            'jam_selesai_resepsi' => 'required',
            'lokasi_ijab' => 'required',
            'lokasi_resepsi' => 'required',
            'avatar_pria' => 'image|file|mimes:jpg,png,jpeg|max:10000',
            'avatar_wanita' => 'image|file|mimes:jpg,png,jpeg|max:10000',
            'gm_ijab' => 'required|url',
            'gm_resepsi' => 'required|url',
            'logo' => 'image|file|mimes:jpg,png,jpeg|max:10000'
        ]);

        $event = Event::find($id);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $foldercheck = public_path() . '/admin/assets/images/events/' . $event->order->invoice;
            $filename = Str::slug($request->name) . '_' . time() . '.' . 'WebP';
            if (!is_dir($foldercheck)) {
                mkdir($foldercheck,0777,true);
            }
            if (File::exists($logo)) {
                $img = Image::make($logo);
                $img->resize(380, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save('admin/assets/images/events/'. $event->order->invoice . '/' . $filename, 80, 'WebP');
                File::delete($logo);
                LogActivity::addToLog('Update logo ' . $event->slug, 'Akses halaman event');
            }
            $event->update([
                // 'code_event' => $event->code_event,
                'slug' => $event->slug,
                'template' => $request->template,
                'link_livestreaming' => $request->link_livestreaming,
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
                'gm_ijab' => $request->gm_ijab,
                'gm_resepsi' => $request->gm_resepsi,
                'link_youtube' => $request->link_youtube,
                'yt_title' => $request->yt_title,
                'yt_desc' => $request->yt_desc,
                'logo_req' => $filename,
                'audio_id' => $request->audio_id,
                'monitor' => $request->monitor,
            ]);
            LogActivity::addToLog('Update halaman event ' . $event->slug, 'Akses halaman event');
        } else {
            $event->update([
                'code_event' => $event->code_event,
                'slug' => $event->slug,
                'template' => $request->template,
                'link_livestreaming' => $request->link_livestreaming,
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
                'gm_ijab' => $request->gm_ijab,
                'gm_resepsi' => $request->gm_resepsi,
                'link_youtube' => $request->link_youtube,
                'yt_title' => $request->yt_title,
                'yt_desc' => $request->yt_desc,
                'audio_id' => $request->audio_id,
                'monitor' => $request->monitor,
            ]);
            LogActivity::addToLog('Update halaman event ' . $event->slug, 'Akses halaman event');
        }

        // DB::table('videos_section')->where('event_id', $id)->update([
        //     'iframe_videos' => $request->link_youtube,
        // ]);
        // DB::table('maps_section')->where('event_id', $id)->update([
        //     'iframe_maps' => $request->gm_ijab,
        // ]);

        if ($request->image_pria != null) {
            $imageexist = $event->avatar_pria;
            $foldercheck = public_path() . '/admin/assets/images/pria/'. $event->order->invoice;
            if (!is_dir($foldercheck)) {
                mkdir($foldercheck,0777,true);
            }
            if ($imageexist != null) {
                $existpath = public_path() . '/admin/assets/images/pria/' . $event->order->invoice . '/'.$imageexist;
                unlink($existpath);
            }
            
            $avatar_pria = $request->image_pria;
            list($type, $avatar_pria) = explode(';', $avatar_pria);
            list(, $avatar_pria)      = explode(',', $avatar_pria);
            $avatar_pria = base64_decode($avatar_pria);
            $avatar_pria = Image::make($avatar_pria);

            $extension = $request->avatar_pria->getClientOriginalExtension();
            $file_avatar_pria = Str::slug($request->nama_lengkap_mempelai_pria) . '_' . time() . '.' . 'WebP';
            $path = public_path() . '/admin/assets/images/pria/' . $event->order->invoice . '/'.$file_avatar_pria;
            // file_put_contents($path, $avatar_pria);
            $avatar_pria->save('admin/assets/images/pria/'. $event->order->invoice . '/' . $file_avatar_pria, 80, 'WebP');

            $event->update([
                'avatar_pria' => $file_avatar_pria
            ]);
        }

        if ($request->image_wanita != null) {
            $imageexist = $event->avatar_wanita;
            $foldercheck = public_path() . '/admin/assets/images/wanita/'. $event->order->invoice;
            if (!is_dir($foldercheck)) {
                mkdir($foldercheck,0777,true);
            }
            if ($imageexist != null) {
                $existpath = public_path() . '/admin/assets/images/wanita/' . $event->order->invoice . '/'.$imageexist;
                unlink($existpath);
            }
            $avatar_wanita = $request->image_pria;
            list($type, $avatar_wanita) = explode(';', $avatar_wanita);
            list(, $avatar_wanita)      = explode(',', $avatar_wanita);
            $avatar_wanita = base64_decode($avatar_wanita);
            $avatar_wanita = Image::make($avatar_wanita);
            // $extension = $request->avatar_pria->getClientOriginalExtension();
            $file_avatar_wanita = Str::slug($request->nama_lengkap_mempelai_wanita) . '_' . time() . '.' . 'WebP';
            $path = public_path() . '/admin/assets/images/wanita/' . $event->order->invoice . '/'.$file_avatar_wanita;
            // file_put_contents($path, $avatar_pria);
            $avatar_wanita->save('admin/assets/images/wanita/'. $event->order->invoice . '/' . $file_avatar_wanita, 80, 'WebP');

            $event->update([
                'avatar_wanita' => $file_avatar_wanita
            ]);
        }
        
        LogActivity::addToLog('Berhasil update event ' . $event->slug, 'Akses halaman event');
        return redirect()->back()->with(['success' => 'Berhasil diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $event = Event::find($id);
        $event->delete($event);

        return redirect()->back()->with(['success' => 'Berhasil dihapus']);
    }

    public function deletePhotoWanita($id)
    {
        try {
            $event = Event::find($id);

            if ($event->avatar_wanita != null) {
                if (File::exists('admin/assets/images/wanita/' . $event->order->invoice . '/' . $event->avatar_wanita)) {
                    File::delete('admin/assets/images/wanita/' . $event->order->invoice . '/' . $event->avatar_wanita);
                    $event->avatar_wanita = null;
                    $event->save();
                    LogActivity::addToLog('Hapus avatar wanita ' .$event->slug,'Delete Avatar Wanita');
                    return redirect()->back()->with([
                        'success' => 'Berhasil hapus avatar wanita'
                    ]);
                }
            }
        } catch (\Throwable $th) {
            LogActivity::addToLog('Error: ' .$th->getMessage(),'Delete Avatar Wanita');
            return redirect()->back()->with([
                'error' => $th->getMessage()
            ]);
        }
    }

    public function deletePhotoPria($id)
    {
        try {
            $event = Event::find($id);

            if ($event->avatar_pria != null) {
                if (File::exists('admin/assets/images/pria/' . $event->order->invoice . '/' . $event->avatar_pria)) {
                    File::delete('admin/assets/images/pria/' . $event->order->invoice . '/' . $event->avatar_pria);
                    $event->avatar_pria = null;
                    $event->save();
                    LogActivity::addToLog('Hapus avatar pria ' .$event->slug,'Delete Avatar Pria');
                    return redirect()->back()->with([
                        'success' => 'Berhasil hapus avatar pria'
                    ]);
                }
            }
        } catch (\Throwable $th) {
            LogActivity::addToLog('Error: ' .$th->getMessage(),'Delete Avatar Pria');
            return redirect()->back()->with([
                'error' => $th->getMessage()
            ]);
        }
    }

    //Photo Event

    public function editPhotos($invoice)
    {
        $order = Order::where('invoice', $invoice)->first();
        $event = Event::where('order_id', $order->id)->first();
        $photos = PhotoEvent::where('event_id', $event->id)->get();
        LogActivity::addToLog('Edit halaman photo ' . $event->id, 'Akses halaman event');
        return view('admin.event.edit.photo', [
            'event' => $event,
            'photos' => $photos
        ]);
    }

    public function storePhoto(Request $request, $id)
    {
        $event = Event::find($id);
        $photo_galleries = $request->file('images');
        if (count($photo_galleries) > 0) {
            foreach ($photo_galleries as $i => $photo) {
                $extension = $photo->getClientOriginalExtension();
                $filenameimg = $i . '-' . Str::slug($event->order->customer_name) . '_' . time() . '.' . 'WebP';
                $foldercheck = public_path() . '/admin/assets/images/events/'. $event->order->invoice;
                if (!is_dir($foldercheck)) {
                    mkdir($foldercheck,0777,true);
                }
                if (File::exists($photo)) {
                    $img = Image::make($photo);
                    $img->resize(1200, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save('admin/assets/images/events/'. $event->order->invoice . '/' . $filenameimg, 80, 'WebP');
                    // $photo->move('admin/assets/images/events/' . $event->order->invoice . '/', $filenameimg);
                    File::delete($photo);
                }
                DB::table('photo_events')->insert([
                    'event_id' => $id,
                    'date' => now(),
                    'name' => $event->nama_panggilan_mempelai_pria . '_' . $event->nama_panggilan_mempelai_wanita,
                    'caption' => 'no caption',
                    'path' => 'admin/assets/images/events/' . $event->order->invoice . '/' . $filenameimg
                ]);
            }
            return redirect()->back()->with(['success' => 'Berhasil menambah gambar baru']);
        } else {
            return redirect()->back()->with(['error' => 'Tidak ada file gambar']);
        }
    }

    public function destroyPhotoEvent($id)
    {
        $photo = PhotoEvent::find($id);
        if ($photo->path != null) {
            if (File::exists($photo->path)) {
                File::delete($photo->path);
            }
        }
        $photo->delete($photo);

        return redirect()->back()->with(['success' => 'Sukses berhasil dihapus']);
    }

    // Wedding Greatings

    public function indexWeddingGreetings($event_id)
    {
        $list_wedding_greetings =  GuestBook::where('event_id', $event_id)->get();

        return view('admin.event.detail.weeding-greetings', [
            'list_wedding_greetings' => $list_wedding_greetings
        ]);
    }

    //-----------------------------------------------------------//

    public function createPDF($invoice)
    {
        $order = Order::where('invoice', $invoice)->first();
        $event = Event::where('order_id', $order->id)->with('guests')->first();
        view()->share('event', $event);
        $pdf = PDF::loadview('admin.event.pdf', $event)->setPaper('A4', 'potrait');

        return $pdf->stream();
    }

    
    //----------------------------------------------------------------------------------------------------------------------//
    public function buildEvent($slug)
    {
        // dd(auth()->user()->roles[0]->id);
        $event = Event::where('slug', $slug)->with('audio')->first();
        $hero = DB::table('hero_section')->where('event_id', $event->id)->first();
        $invitation = DB::table('invitation_section')->where('event_id', $event->id)->first();
        $gallery = DB::table('gallery_section')->where('event_id', $event->id)->first();
        $countdown = DB::table('countdown_section')->where('event_id', $event->id)->first();
        $maps = DB::table('maps_section')->where('event_id', $event->id)->first();
        $streaming = DB::table('streaming_section')->where('event_id', $event->id)->first();
        $videos = DB::table('videos_section')->where('event_id', $event->id)->first();
        $_event = DB::table('event_section')->where('event_id', $event->id)->first();
        $comment = DB::table('comment_section')->where('event_id', $event->id)->first();
        $footer = DB::table('footer_section')->where('event_id', $event->id)->first();
        $data_guestbook = GuestBook::where('event_id', $event->id)->get();
        $photo_event = PhotoEvent::where('event_id', $event->id)->get()->toArray();
        $data_audio = Audio::orderBy('name', 'ASC')->get();
        return view('event-builder', [
            'event' => $event,
            'data_guestbook' => $data_guestbook,
            'photo_event' => $photo_event,
            'hero' => $hero,
            'invitation' => $invitation,
            'gallery' => $gallery,
            'countdown' => $countdown,
            'maps' => $maps,
            'streaming' => $streaming,
            'videos' => $videos,
            '_event' => $_event,
            'comment' => $comment,
            'footer' => $footer,
            'data_audio' => $data_audio,
        ]);
    }

    public function storeEventPage(Request $request)
    {
        // dd($request);
        $event_id = $request->event_id;
        $event = Event::where('id', $event_id)->first();
        $heroField = DB::table('hero_section')->select('background', 'color_teks_atas', 'color_teks_tengah', 'color_teks_bawah')->where('event_id', $event_id)->first();
        // dd($heroField);
        $invitationField = DB::table('invitation_section')->select('background', 'color_teks_atas', 'color_teks_tengah', 'color_teks_bawah')->where('event_id', $event_id)->first();
        $galleryField = DB::table('gallery_section')->select('background', 'color_teks_atas', 'color_teks_bawah')->where('event_id', $event_id)->first();
        $countdownField = DB::table('countdown_section')->select('background', 'color_teks_atas', 'color_teks_tengah', 'color_teks_bawah')->where('event_id', $event_id)->first();
        $mapsField = DB::table('maps_section')->select('background', 'color_teks_atas', 'color_teks_bawah', 'iframe_maps')->where('event_id', $event_id)->first();
        $streamingField = DB::table('streaming_section')->select('background', 'color_teks_atas', 'color_teks_bawah', 'iframe_streaming')->where('event_id', $event_id)->first();
        $videosField = DB::table('videos_section')->select('background', 'color_teks_atas', 'color_teks_bawah', 'iframe_videos')->where('event_id', $event_id)->first();
        $eventField = DB::table('event_section')->select('background', 'color_teks_atas', 'color_teks_bawah')->where('event_id', $event_id)->first();
        $commentField = DB::table('comment_section')->select('background', 'color_teks_atas', 'color_teks_bawah')->where('event_id', $event_id)->first();
        $footerField = DB::table('footer_section')->select('background', 'color_teks_atas', 'color_teks_bawah')->where('event_id', $event_id)->first();
        try {
            if ($event->template !== 'Custom') {
                $event->update([
                    'template' => 'Custom'
                ]);
            }
            if ($request->audio_id !== null) {
                $event->update([
                    'audio_id' => $request->audio_id
                ]);
            }
            if ($request) {
                $this->_heroStore($request, $heroField, $event, $event_id);
                $this->_invitationStore($request, $invitationField, $event, $event_id);
                $this->_countdownStore($request, $countdownField, $event, $event_id);
                $this->_mapsStore($request, $mapsField, $event, $event_id);
                $this->_streamingStore($request, $streamingField, $event, $event_id);
                $this->_videosStore($request, $videosField, $event, $event_id);
                $this->_eventStore($request, $eventField, $event, $event_id);
                $this->commentStore($request, $commentField, $event, $event_id);
                $this->footerStore($request, $footerField, $event, $event_id);
                $this->_galleryStore($request, $galleryField, $event, $event_id);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

        return redirect()->back();
    }

    function _heroStore($request, $heroField, $event, $event_id)
    {
        // cek color
        if ($request->hero_color_teks_atas == '#49542b' || $request->hero_color_teks_atas == null) {
            if ($heroField !== null) {
                $hero_teks_color_atas = $heroField->color_teks_atas;
            } else {
                $hero_teks_color_atas = null;
            }
        } else {
            $hero_teks_color_atas = $request->hero_color_teks_atas;
        }
        if ($request->hero_color_teks_tengah == '#49542b' || $request->hero_color_teks_tengah == null) {
            if ($heroField !== null) {
                $hero_teks_color_tengah = $heroField->color_teks_tengah;
            } else {
                $hero_teks_color_tengah = null;
            }
        } else {
            $hero_teks_color_tengah = $request->hero_color_teks_tengah;
        }
        if ($request->hero_color_teks_bawah == '#49542b' || $request->hero_color_teks_bawah == null) {

            if ($heroField !== null) {
                $hero_teks_color_bawah = $heroField->color_teks_bawah;
            } else {
                $hero_teks_color_bawah = null;
            }
        } else {
            $hero_teks_color_bawah = $request->hero_color_teks_bawah;
        }
        // end cek color
        if ($request->hasFile('hero_background')) {
            if ($request->hero_background_fix == $request->hero_background->getClientOriginalName()) {
                $photo = $request->file('hero_background');
                $extension = $photo->getClientOriginalExtension();
                $filename = Str::slug('hero-background') . '_' . $event->slug . '.' . $extension;
                if (File::exists($photo)) {
                    $photo->move('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/', $filename);
                    File::delete($photo);
                }
            } else {
                if ($request->hero_background_fix) {
                    $filename = $request->hero_background_fix;
                }
            }
        } else {
            if ($request->hero_background_fix) {
                $filename = $request->hero_background_fix;
                if (File::exists('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/' . $heroField->background)) {
                    File::delete('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/' . $heroField->background);
                }
            } else if ($heroField) {
                $filename = $heroField->background;
            } else if ($request->hero_background_fix == null) {
                $filename = null;
            }
        }
        if (!$heroField || $heroField == null) {
            // redirect()->back()->with('error', 'Buat event terlebih dahulu');
            DB::table('hero_section')->insert([
                'event_id' => $event_id,
                'background' => $filename,
                'teks_judul' => $request->hero_teks_judul,
                'teks_atas' => $request->hero_teks_atas,
                'teks_bawah' => $request->hero_teks_bawah,
                'perataan' => $request->hero_perataan,
                'container' => $request->hero_container,
                'color_teks_atas' => $hero_teks_color_atas,
                'color_teks_tengah' => $hero_teks_color_tengah,
                'color_teks_bawah' => $hero_teks_color_bawah,
                'display' => $request->hero_display,
                'overlay' => $request->hero_overlay,
                'font_judul' => $request->font_judul,
                'font_judul_weight' => $request->font_judul_weight,
                'font_teks' => $request->font_teks,
            ]);
        } else {
            DB::table('hero_section')->where('event_id', $event_id)->update([
                'background' => $filename,
                'teks_judul' => $request->hero_teks_judul,
                'teks_atas' => $request->hero_teks_atas,
                'teks_bawah' => $request->hero_teks_bawah,
                'perataan' => $request->hero_perataan,
                'container' => $request->hero_container,
                'color_teks_atas' => $hero_teks_color_atas,
                'color_teks_tengah' => $hero_teks_color_tengah,
                'color_teks_bawah' => $hero_teks_color_bawah,
                'display' => $request->hero_display,
                'overlay' => $request->hero_overlay,
                'font_judul' => $request->font_judul,
                'font_judul_weight' => $request->font_judul_weight,
                'font_teks' => $request->font_teks,
            ]);
        }
    }
    function _invitationStore($request, $invitationField, $event, $event_id)
    {
        // cek color

        if ($request->invitation_color_teks_atas == '#49542b' || $request->invitation_color_teks_tengah == null) {
            if ($invitationField !== null) {
                $invitation_teks_color_atas = $invitationField->color_teks_atas;
            } else {
                $invitation_teks_color_atas = null;
            }
        } else {
            $invitation_teks_color_atas = $request->invitation_color_teks_atas;
        }
        if ($request->invitation_color_teks_tengah == '#49542b' || $request->invitation_color_teks_tengah == null) {
            if ($invitationField !== null) {
                $invitation_teks_color_tengah = $invitationField->color_teks_tengah;
            } else {
                $invitation_teks_color_tengah = null;
            }
        } else {
            $invitation_teks_color_tengah = $request->invitation_color_teks_tengah;
        }
        if ($request->invitation_color_teks_bawah == '#49542b' || $request->invitation_color_teks_tengah == null) {
            if ($invitationField !== null) {
                $invitation_teks_color_bawah = $invitationField->color_teks_bawah;
            } else {
                $invitation_teks_color_bawah = null;
            }
        } else {
            $invitation_teks_color_bawah = $request->invitation_color_teks_bawah;
        }
        // end cek color
        if ($request->hasFile('invitation_background')) {
            if ($request->invitation_background_fix == $request->invitation_background->getClientOriginalName()) {
                $photo = $request->file('invitation_background');
                $extension = $photo->getClientOriginalExtension();
                $filename = Str::slug('invitation-background') . '_' . $event->slug . '.' . $extension;
                if (File::exists($photo)) {
                    $photo->move('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/', $filename);
                    File::delete($photo);
                }
            } else {
                if ($request->invitation_background_fix) {
                    $filename = $request->invitation_background_fix;
                }
            }
        } else {

            if ($request->invitation_background_fix) {
                $filename = $request->invitation_background_fix;
                if ($invitationField !== null) {
                    if (File::exists('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/' . $invitationField->background)) {
                        File::delete('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/' . $invitationField->background);
                    }
                }
            } else {
                if ($invitationField !== null) {
                    $filename = $invitationField->background;
                } else {
                    $filename = null;
                }
            }
        }
        if ($invitationField == null) {
            // redirect()->back()->with('error', 'Buat event terlebih dahulu');
            DB::table('invitation_section')->insert([
                'event_id' => $event_id,
                'background' => $filename,
                'teks_atas' => $request->invitation_teks_atas,
                'teks_tengah' => $request->invitation_teks_tengah,
                'teks_bawah' => $request->invitation_teks_bawah,
                'perataan' => $request->invitation_perataan,
                'container' => $request->invitation_container,
                'color_teks_atas' => $invitation_teks_color_atas,
                'color_teks_tengah' => $invitation_teks_color_tengah,
                'color_teks_bawah' => $invitation_teks_color_bawah,
                'display' => $request->invitation_display,
                'overlay' => $request->invitation_overlay,
                'font_judul' => $request->font_judul,
                'font_judul_weight' => $request->font_judul_weight,
                'font_teks' => $request->font_teks,
            ]);
        } else {
            DB::table('invitation_section')->where('event_id', $event_id)->update([
                'background' => $filename,
                'teks_atas' => $request->invitation_teks_atas,
                'teks_tengah' => $request->invitation_teks_tengah,
                'teks_bawah' => $request->invitation_teks_bawah,
                'perataan' => $request->invitation_perataan,
                'container' => $request->invitation_container,
                'color_teks_atas' => $invitation_teks_color_atas,
                'color_teks_tengah' => $invitation_teks_color_tengah,
                'color_teks_bawah' => $invitation_teks_color_bawah,
                'display' => $request->invitation_display,
                'overlay' => $request->invitation_overlay,
                'font_judul' => $request->font_judul,
                'font_judul_weight' => $request->font_judul_weight,
                'font_teks' => $request->font_teks,
            ]);
        }
    }
    function _countdownStore($request, $countdownField, $event, $event_id)
    {
        // cek color
        if ($request->countdown_color_teks_atas == '#49542b' || $request->countdown_color_teks_atas == null) {
            if ($countdownField !== null) {
                $countdown_teks_color_atas = $countdownField->color_teks_atas;
            } else {
                $countdown_teks_color_atas = $request->countdown_color_teks_atas;
            }
        } else {
            $countdown_teks_color_atas = $request->countdown_color_teks_atas;
        }
        if ($request->countdown_color_teks_tengah == '#49542b' || $request->countdown_color_teks_tengah == null) {
            if ($countdownField !== null) {
                $countdown_teks_color_tengah = $countdownField->color_teks_tengah;
            } else {
                $countdown_teks_color_tengah = $request->countdown_color_teks_tengah;
            }
        } else {
            $countdown_teks_color_tengah = $request->countdown_color_teks_tengah;
        }
        if ($request->countdown_color_teks_bawah == '#49542b' || $request->countdown_color_teks_bawah == null) {
            if ($countdownField !== null) {
                $countdown_teks_color_bawah = $countdownField->color_teks_bawah;
            } else {
                $countdown_teks_color_bawah = $request->countdown_color_teks_bawah;
            }
        } else {
            $countdown_teks_color_bawah = $request->countdown_color_teks_bawah;
        }
        // end cek color
        if ($request->hasFile('countdown_background')) {
            if ($request->countdown_background_fix == $request->countdown_background->getClientOriginalName()) {
                $photo = $request->file('countdown_background');
                $extension = $photo->getClientOriginalExtension();
                $filename = Str::slug('countdown-background') . '_' . $event->slug . '.' . $extension;
                if (File::exists($photo)) {
                    $photo->move('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/', $filename);
                    File::delete($photo);
                }
            } else {
                if ($request->countdown_background_fix) {
                    $filename = $request->countdown_background_fix;
                }
            }
        } else {

            if ($request->countdown_background_fix) {
                $filename = $request->countdown_background_fix;
                if ($countdownField !== null) {
                    if (File::exists('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/' . $countdownField->background)) {
                        File::delete('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/' . $countdownField->background);
                    }
                }
            } else {
                if ($countdownField !== null) {
                    $filename = $countdownField->background;
                } else {
                    $filename = null;
                }
            }
        }
        if ($countdownField == null) {
            // redirect()->back()->with('error', 'Buat event terlebih dahulu');
            DB::table('countdown_section')->insert([
                'event_id' => $event_id,
                'background' => $filename,
                'perataan' => $request->countdown_perataan,
                'container' => $request->countdown_container,
                'color_teks_atas' => $countdown_teks_color_atas,
                'color_teks_tengah' => $countdown_teks_color_tengah,
                'color_teks_bawah' => $countdown_teks_color_bawah,
                'display' => $request->countdown_display,
                'overlay' => $request->countdown_overlay,
                'font_judul' => $request->font_judul,
                'font_judul_weight' => $request->font_judul_weight,
                'font_teks' => $request->font_teks,
            ]);
        } else {
            DB::table('countdown_section')->where('event_id', $event_id)->update([
                'background' => $filename,
                'perataan' => $request->countdown_perataan,
                'container' => $request->countdown_container,
                'color_teks_atas' => $countdown_teks_color_atas,
                'color_teks_tengah' => $countdown_teks_color_tengah,
                'color_teks_bawah' => $countdown_teks_color_bawah,
                'display' => $request->countdown_display,
                'overlay' => $request->countdown_overlay,
                'font_judul' => $request->font_judul,
                'font_judul_weight' => $request->font_judul_weight,
                'font_teks' => $request->font_teks,
            ]);
        }
    }
    function _mapsStore($request, $mapsField, $event, $event_id)
    {
        // cek color
        if ($request->maps_color_teks_atas == '#49542b' || $request->maps_color_teks_atas == null) {
            if ($mapsField !== null) {
                $maps_teks_color_atas = $mapsField->color_teks_atas;
            } else {
                $maps_teks_color_atas = $request->maps_color_teks_atas;
            }
        } else {
            $maps_teks_color_atas = $request->maps_color_teks_atas;
        }
        if ($request->maps_color_teks_tengah == '#49542b' || $request->maps_color_teks_tengah == null) {
            if ($mapsField !== null) {
                $maps_teks_color_tengah = $mapsField->color_teks_bawah;
            } else {
                $maps_teks_color_tengah = $request->maps_color_teks_tengah;
            }
        } else {
            $maps_teks_color_tengah = $request->maps_color_teks_tengah;
        }
        // end cek color
        if ($request->hasFile('maps_background')) {
            if ($request->maps_background_fix == $request->maps_background->getClientOriginalName()) {
                $photo = $request->file('maps_background');
                $extension = $photo->getClientOriginalExtension();
                $filename = Str::slug('maps-background') . '_' . $event->slug . '.' . $extension;
                if (File::exists($photo)) {
                    $photo->move('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/', $filename);
                    File::delete($photo);
                }
            } else {
                if ($request->maps_background_fix) {
                    $filename = $request->maps_background_fix;
                }
            }
        } else {
            if ($request->maps_background_fix) {
                $filename = $request->maps_background_fix;
                if ($mapsField !== null) {
                    if (File::exists('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/' . $mapsField->background)) {
                        File::delete('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/' . $mapsField->background);
                    }
                }
            } else {
                if ($mapsField !== null) {
                    $filename = $mapsField->background;
                } else {
                    $filename = null;
                }
            }
        }
        if ($mapsField == null) {
            // redirect()->back()->with('error', 'Buat event terlebih dahulu');
            DB::table('maps_section')->insert([
                'event_id' => $event_id,
                'background' => $filename,
                'teks_atas' => $request->maps_teks_atas,
                'teks_bawah' => $request->maps_teks_tengah,
                'iframe_maps' => $request->iframe_maps,
                'perataan' => $request->maps_perataan,
                'container' => $request->maps_container,
                'color_teks_atas' => $maps_teks_color_atas,
                'color_teks_bawah' => $maps_teks_color_tengah,
                'display' => $request->maps_display,
                'overlay' => $request->maps_overlay,
                'font_judul' => $request->font_judul,
                'font_judul_weight' => $request->font_judul_weight,
                'font_teks' => $request->font_teks
            ]);
        } else {
            DB::table('maps_section')->where('event_id', $event_id)->update([
                'background' => $filename,
                'teks_atas' => $request->maps_teks_atas,
                'teks_bawah' => $request->maps_teks_tengah,
                'iframe_maps' => $request->iframe_maps,
                'perataan' => $request->maps_perataan,
                'container' => $request->maps_container,
                'color_teks_atas' => $maps_teks_color_atas,
                'color_teks_bawah' => $maps_teks_color_tengah,
                'display' => $request->maps_display,
                'overlay' => $request->maps_overlay,
                'font_judul' => $request->font_judul,
                'font_judul_weight' => $request->font_judul_weight,
                'font_teks' => $request->font_teks
            ]);
        }
        $event->update([
            'gm_ijab' => $request->iframe_maps
        ]);
    }
    function _streamingStore($request, $streamingField, $event, $event_id)
    {
        // cek color
        if ($request->streaming_color_teks_atas == '#49542b' || $request->streaming_color_teks_atas == null) {
            if ($streamingField !== null) {
                $streaming_teks_color_atas = $streamingField->color_teks_atas;
            } else {
                $streaming_teks_color_atas = $request->streaming_color_teks_atas;
            }
        } else {
            $streaming_teks_color_atas = $request->streaming_color_teks_atas;
        }
        if ($request->streaming_color_teks_tengah == '#49542b' || $request->streaming_color_teks_tengah == null) {
            if ($streamingField !== null) {
                $streaming_teks_color_tengah = $streamingField->color_teks_bawah;
            } else {
                $streaming_teks_color_tengah = $request->streaming_color_teks_tengah;
            }
        } else {
            $streaming_teks_color_tengah = $request->streaming_color_teks_tengah;
        }
        // end cek color
        if ($request->hasFile('streaming_background')) {
            if ($request->streaming_background_fix == $request->streaming_background->getClientOriginalName()) {
                $photo = $request->file('streaming_background');
                $extension = $photo->getClientOriginalExtension();
                $filename = Str::slug('streaming-background') . '_' . $event->slug . '.' . $extension;
                if (File::exists($photo)) {
                    $photo->move('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/', $filename);
                    File::delete($photo);
                }
            } else {
                if ($request->streaming_background_fix) {
                    $filename = $request->streaming_background_fix;
                }
            }
        } else {
            if ($request->streaming_background_fix) {
                $filename = $request->streaming_background_fix;
                if ($streamingField !== null) {
                    if (File::exists('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/' . $streamingField->background)) {
                        File::delete('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/' . $streamingField->background);
                    }
                }
            } else {
                if ($streamingField !== null) {
                    $filename = $streamingField->background;
                } else {
                    $filename = null;
                }
            }
        }
        if ($streamingField == null) {
            // redirect()->back()->with('error', 'Buat event terlebih dahulu');
            DB::table('streaming_section')->insert([
                'event_id' => $event_id,
                'background' => $filename,
                'teks_atas' => $request->streaming_teks_atas,
                'teks_bawah' => $request->streaming_teks_tengah,
                'iframe_streaming' => $request->iframe_streaming,
                'perataan' => $request->streaming_perataan,
                'container' => $request->streaming_container,
                'color_teks_atas' => $streaming_teks_color_atas,
                'color_teks_bawah' => $streaming_teks_color_tengah,
                'display' => $request->streaming_display,
                'overlay' => $request->streaming_overlay,
                'font_judul' => $request->font_judul,
                'font_judul_weight' => $request->font_judul_weight,
                'font_teks' => $request->font_teks,
            ]);
        } else {
            DB::table('streaming_section')->where('event_id', $event_id)->update([
                'background' => $filename,
                'teks_atas' => $request->streaming_teks_atas,
                'teks_bawah' => $request->streaming_teks_tengah,
                'iframe_streaming' => $request->iframe_streaming,
                'perataan' => $request->streaming_perataan,
                'container' => $request->streaming_container,
                'color_teks_atas' => $streaming_teks_color_atas,
                'color_teks_bawah' => $streaming_teks_color_tengah,
                'display' => $request->streaming_display,
                'overlay' => $request->streaming_overlay,
                'font_judul' => $request->font_judul,
                'font_judul_weight' => $request->font_judul_weight,
                'font_teks' => $request->font_teks,
            ]);
        }
    }
    function _galleryStore($request, $galleryField, $event, $event_id)
    {

        // cek color
        if ($request->gallery_color_teks_atas == '#49542b' || $request->gallery_color_teks_atas == null) {
            if ($galleryField !== null) {
                $gallery_teks_color_atas = $galleryField->color_teks_atas;
            } else {
                $gallery_teks_color_atas = $request->gallery_color_teks_atas;
            }
        } else {
            $gallery_teks_color_atas = $request->gallery_color_teks_atas;
        }
        if ($request->gallery_color_teks_bawah == '#49542b' || $request->gallery_color_teks_bawah == null) {
            if ($galleryField !== null) {
                $gallery_teks_color_bawah = $galleryField->color_teks_bawah;
            } else {
                $gallery_teks_color_bawah = $request->gallery_color_teks_bawah;
            }
        } else {
            $gallery_teks_color_bawah = $request->gallery_color_teks_bawah;
        }
        // end cek color
        // upload image
        if ($request->hasFile('gallery_background')) {
            if ($request->gallery_background_fix == $request->gallery_background->getClientOriginalName()) {
                $photo = $request->file('gallery_background');
                $extension = $photo->getClientOriginalExtension();
                $background_filename = Str::slug('gallery-background') . '_' . $event->slug . '.' . $extension;
                if (File::exists($photo)) {
                    $photo->move('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/', $background_filename);
                    File::delete($photo);
                }
            } else {
                if ($request->gallery_background_fix) {
                    $background_filename = $request->gallery_background_fix;
                }
            }
        } else {
            if ($request->gallery_background_fix) {
                $background_filename = $request->gallery_background_fix;
                if ($galleryField !== null) {
                    if (File::exists('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/' . $galleryField->background)) {
                        File::delete('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/' . $galleryField->background);
                    }
                }
            } else {
                if ($galleryField !== null) {
                    $background_filename = $galleryField->background;
                } else {
                    $background_filename = null;
                }
            }
        }
        if ($galleryField == null) {
            // redirect()->back()->with('error', 'Buat event terlebih dahulu');
            DB::table('gallery_section')->insert([
                'event_id' => $event_id,
                'background' => $background_filename,
                'teks_atas' => $request->gallery_teks_atas,
                'teks_bawah' => $request->gallery_teks_tengah,
                'perataan' => $request->gallery_perataan,
                'container' => $request->gallery_container,
                'color_teks_atas' => $gallery_teks_color_atas,
                'color_teks_bawah' => $gallery_teks_color_bawah,
                'display' => $request->gallery_display,
                'overlay' => $request->gallery_overlay,
                'font_judul' => $request->font_judul,
                'font_judul_weight' => $request->font_judul_weight,
                'font_teks' => $request->font_teks,
            ]);
        } else {
            DB::table('gallery_section')->where('event_id', $event_id)->update([
                'background' => $background_filename,
                'teks_atas' => $request->gallery_teks_atas,
                'teks_bawah' => $request->gallery_teks_tengah,
                'perataan' => $request->gallery_perataan,
                'container' => $request->gallery_container,
                'color_teks_atas' => $gallery_teks_color_atas,
                'color_teks_bawah' => $gallery_teks_color_bawah,
                'display' => $request->gallery_display,
                'overlay' => $request->gallery_overlay,
                'font_judul' => $request->font_judul,
                'font_judul_weight' => $request->font_judul_weight,
                'font_teks' => $request->font_teks,
            ]);
        }
        $photo_galleries = $request->file('images');
        if (count($photo_galleries) > 0) {
            foreach ($photo_galleries as $i => $photo) {
                $extension = $photo->getClientOriginalExtension();
                $filenameimg = $i . '-' . Str::slug($event->order->customer_name) . '_' . time() . '.' . $extension;
                if (File::exists($photo)) {
                    $photo->move('admin/assets/images/events/' . $event->order->invoice . '/', $filenameimg);
                    File::delete($photo);
                }
                DB::table('photo_events')->insert([
                    'event_id' => $event_id,
                    'date' => now(),
                    'name' => $event->nama_panggilan_mempelai_pria . '_' . $event->nama_panggilan_mempelai_wanita,
                    'caption' => 'no caption',
                    'path' => 'admin/assets/images/events/' . $event->order->invoice . '/' . $filenameimg
                ]);
            }
        }
    }

    function _videosStore($request, $videosField, $event, $event_id)
    {
        // cek color
        if ($request->videos_color_teks_atas == '#49542b' || $request->videos_color_teks_atas == null) {
            if ($videosField !== null) {
                $videos_teks_color_atas = $videosField->color_teks_atas;
            } else {
                $videos_teks_color_atas = $request->videos_color_teks_atas;
            }
        } else {
            $videos_teks_color_atas = $request->videos_color_teks_atas;
        }
        if ($request->videos_color_teks_tengah == '#49542b' || $request->videos_color_teks_tengah == null) {
            if ($videosField !== null) {
                $videos_teks_color_tengah = $videosField->color_teks_bawah;
            } else {
                $videos_teks_color_tengah = $request->videos_color_teks_tengah;
            }
        } else {
            $videos_teks_color_tengah = $request->videos_color_teks_tengah;
        }
        // end cek color
        if ($request->hasFile('videos_background')) {
            if ($request->videos_background_fix == $request->videos_background->getClientOriginalName()) {
                $photo = $request->file('videos_background');
                $extension = $photo->getClientOriginalExtension();
                $filename = Str::slug('videos-background') . '_' . $event->slug . '.' . $extension;
                if (File::exists($photo)) {
                    $photo->move('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/', $filename);
                    File::delete($photo);
                }
            } else {
                if ($request->videos_background_fix) {
                    $filename = $request->videos_background_fix;
                }
            }
        } else {
            if ($request->videos_background_fix) {
                $filename = $request->videos_background_fix;
                if ($videosField !== null) {
                    if (File::exists('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/' . $videosField->background)) {
                        File::delete('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/' . $videosField->background);
                    }
                }
            } else {
                if ($videosField !== null) {
                    $filename = $videosField->background;
                } else {
                    $filename = null;
                }
            }
        }
        if ($videosField == null) {
            // redirect()->back()->with('error', 'Buat event terlebih dahulu');
            DB::table('videos_section')->insert([
                'event_id' => $event_id,
                'background' => $filename,
                'teks_atas' => $request->videos_teks_atas,
                'teks_bawah' => $request->videos_teks_tengah,
                'iframe_videos' => $request->iframe_videos,
                'perataan' => $request->videos_perataan,
                'container' => $request->videos_container,
                'color_teks_atas' => $videos_teks_color_atas,
                'color_teks_bawah' => $videos_teks_color_tengah,
                'display' => $request->videos_display,
                'overlay' => $request->videos_overlay,
                'font_judul' => $request->font_judul,
                'font_judul_weight' => $request->font_judul_weight,
                'font_teks' => $request->font_teks,
            ]);
        } else {
            DB::table('videos_section')->where('event_id', $event_id)->update([
                'background' => $filename,
                'teks_atas' => $request->videos_teks_atas,
                'teks_bawah' => $request->videos_teks_tengah,
                'iframe_videos' => $request->iframe_videos,
                'perataan' => $request->videos_perataan,
                'container' => $request->videos_container,
                'color_teks_atas' => $videos_teks_color_atas,
                'color_teks_bawah' => $videos_teks_color_tengah,
                'display' => $request->videos_display,
                'overlay' => $request->videos_overlay,
                'font_judul' => $request->font_judul,
                'font_judul_weight' => $request->font_judul_weight,
                'font_teks' => $request->font_teks,
            ]);
        }
        $event->update([
            'link_youtube' => $request->iframe_videos
        ]);
    }
    function _eventStore($request, $eventField, $event, $event_id)
    {
        // cek color
        if ($request->event_color_teks_atas == '#49542b' || $request->event_color_teks_atas == null) {
            if ($eventField !== null) {
                $event_teks_color_atas = $eventField->color_teks_atas;
            } else {
                $event_teks_color_atas = $request->event_color_teks_atas;
            }
        } else {
            $event_teks_color_atas = $request->event_color_teks_atas;
        }
        if ($request->event_color_teks_bawah == '#49542b' || $request->event_color_teks_bawah == null) {
            if ($eventField !== null) {
                $event_teks_color_bawah = $eventField->color_teks_bawah;
            } else {
                $event_teks_color_bawah = $request->event_color_teks_bawah;
            }
        } else {
            $event_teks_color_bawah = $request->event_color_teks_bawah;
        }
        // end cek color
        if ($request->hasFile('event_background')) {
            if ($request->event_background_fix == $request->event_background->getClientOriginalName()) {
                $photo = $request->file('event_background');
                $extension = $photo->getClientOriginalExtension();
                $filename = Str::slug('event-background') . '_' . $event->slug . '.' . $extension;
                if (File::exists($photo)) {
                    $photo->move('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/', $filename);
                    File::delete($photo);
                }
            } else {
                if ($request->event_background_fix) {
                    $filename = $request->event_background_fix;
                }
            }
        } else {
            if ($request->event_background_fix) {
                $filename = $request->event_background_fix;
                if ($eventField !== null) {
                    if (File::exists('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/' . $eventField->background)) {
                        File::delete('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/' . $eventField->background);
                    }
                }
            } else {
                if ($eventField !== null) {
                    $filename = $eventField->background;
                } else {
                    $filename = null;
                }
            }
        }
        if ($eventField == null) {
            // redirect()->back()->with('error', 'Buat event terlebih dahulu');
            DB::table('event_section')->insert([
                'event_id' => $event_id,
                'background' => $filename,
                'teks_atas' => $request->event_teks_atas,
                'teks_bawah' => $request->event_teks_bawah,
                'perataan' => $request->event_perataan,
                'container' => $request->event_container,
                'color_teks_atas' => $event_teks_color_atas,
                'color_teks_bawah' => $event_teks_color_bawah,
                'display' => $request->event_display,
                'overlay' => $request->event_overlay,
                'font_judul' => $request->font_judul,
                'font_judul_weight' => $request->font_judul_weight,
                'font_teks' => $request->font_teks,
            ]);
        } else {
            DB::table('event_section')->where('event_id', $event_id)->update([
                'background' => $filename,
                'teks_atas' => $request->event_teks_atas,
                'teks_bawah' => $request->event_teks_bawah,
                'perataan' => $request->event_perataan,
                'container' => $request->event_container,
                'color_teks_atas' => $event_teks_color_atas,
                'color_teks_bawah' => $event_teks_color_bawah,
                'display' => $request->event_display,
                'overlay' => $request->event_overlay,
                'font_judul' => $request->font_judul,
                'font_judul_weight' => $request->font_judul_weight,
                'font_teks' => $request->font_teks,
            ]);
        }
    }
    function commentStore($request, $commentField, $event, $event_id)
    {
        // cek color
        if ($request->comment_color_teks_atas == '#49542b' || $request->comment_color_teks_atas == null) {
            if ($commentField !== null) {
                $comment_teks_color_atas = $commentField->color_teks_atas;
            } else {
                $comment_teks_color_atas = $request->comment_color_teks_atas;
            }
        } else {
            $comment_teks_color_atas = $request->comment_color_teks_atas;
        }
        if ($request->comment_color_teks_bawah == '#49542b' || $request->comment_color_teks_bawah == null) {
            if ($commentField !== null) {
                $comment_teks_color_bawah = $commentField->color_teks_bawah;
            } else {
                $comment_teks_color_bawah = $request->comment_color_teks_bawah;
            }
        } else {
            $comment_teks_color_bawah = $request->comment_color_teks_bawah;
        }
        // end cek color
        if ($request->hasFile('comment_background')) {
            if ($request->comment_background_fix == $request->comment_background->getClientOriginalName()) {
                $photo = $request->file('comment_background');
                $extension = $photo->getClientOriginalExtension();
                $filename = Str::slug('comment-background') . '_' . $event->slug . '.' . $extension;
                if (File::exists($photo)) {
                    $photo->move('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/', $filename);
                    File::delete($photo);
                }
            } else {
                if ($request->comment_background_fix) {
                    $filename = $request->comment_background_fix;
                }
            }
        } else {
            if ($request->comment_background_fix) {
                $filename = $request->comment_background_fix;
                if ($commentField !== null) {
                    if (File::exists('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/' . $commentField->background)) {
                        File::delete('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/' . $commentField->background);
                    }
                }
            } else {
                if ($commentField !== null) {
                    $filename = $commentField->background;
                } else {
                    $filename = null;
                }
            }
        }
        if ($commentField == null) {
            // redirect()->back()->with('error', 'Buat event terlebih dahulu');
            DB::table('comment_section')->insert([
                'event_id' => $event_id,
                'background' => $filename,
                'teks_atas' => $request->comment_teks_atas,
                'teks_bawah' => $request->comment_teks_bawah,
                'perataan' => $request->comment_perataan,
                'container' => $request->comment_container,
                'color_teks_atas' => $comment_teks_color_atas,
                'color_teks_bawah' => $comment_teks_color_bawah,
                'display' => $request->comment_display,
                'overlay' => $request->comment_overlay,
                'font_judul' => $request->font_judul,
                'font_judul_weight' => $request->font_judul_weight,
                'font_teks' => $request->font_teks,
            ]);
        } else {
            DB::table('comment_section')->where('event_id', $event_id)->update([
                'background' => $filename,
                'teks_atas' => $request->comment_teks_atas,
                'teks_bawah' => $request->comment_teks_bawah,
                'perataan' => $request->comment_perataan,
                'container' => $request->comment_container,
                'color_teks_atas' => $comment_teks_color_atas,
                'color_teks_bawah' => $comment_teks_color_bawah,
                'display' => $request->comment_display,
                'overlay' => $request->comment_overlay,
                'font_judul' => $request->font_judul,
                'font_judul_weight' => $request->font_judul_weight,
                'font_teks' => $request->font_teks,
            ]);
        }
    }
    function footerStore($request, $footerField, $event, $event_id)
    {
        // cek color
        if ($request->footer_color_teks_atas == '#49542b' || $request->footer_color_teks_atas == null) {
            if ($footerField !== null) {
                $footer_teks_color_atas = $footerField->color_teks_atas;
            } else {
                $footer_teks_color_atas = $request->footer_color_teks_atas;
            }
        } else {
            $footer_teks_color_atas = $request->footer_color_teks_atas;
        }
        if ($request->footer_color_teks_bawah == '#49542b' || $request->footer_color_teks_bawah == null) {
            if ($footerField !== null) {
                $footer_teks_color_bawah = $footerField->color_teks_bawah;
            } else {
                $footer_teks_color_bawah = $request->footer_color_teks_bawah;
            }
        } else {
            $footer_teks_color_bawah = $request->footer_color_teks_bawah;
        }
        // end cek color
        if ($request->hasFile('footer_background')) {
            if ($request->footer_background_fix == $request->footer_background->getClientOriginalName()) {
                $photo = $request->file('footer_background');
                $extension = $photo->getClientOriginalExtension();
                $filename = Str::slug('footer-background') . '_' . $event->slug . '.' . $extension;
                if (File::exists($photo)) {
                    $photo->move('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/', $filename);
                    File::delete($photo);
                }
            } else {
                if ($request->footer_background_fix) {
                    $filename = $request->footer_background_fix;
                }
            }
        } else {
            if ($request->footer_background_fix) {
                $filename = $request->footer_background_fix;
                if ($footerField !== null) {
                    if (File::exists('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/' . $footerField->background)) {
                        File::delete('admin/assets/images/events/builder/' . $event->slug . '-' . $event_id . '/' . $footerField->background);
                    }
                }
            } else {
                if ($footerField !== null) {
                    $filename = $footerField->background;
                } else {
                    $filename = null;
                }
            }
        }
        if ($footerField == null) {
            // redirect()->back()->with('error', 'Buat event terlebih dahulu');
            DB::table('footer_section')->insert([
                'event_id' => $event_id,
                'background' => $filename,
                'teks_atas' => $request->footer_teks_atas,
                'teks_bawah' => $request->footer_teks_bawah,
                'perataan' => $request->footer_perataan,
                'container' => $request->footer_container,
                'color_teks_atas' => $footer_teks_color_atas,
                'color_teks_bawah' => $footer_teks_color_bawah,
                'display' => $request->footer_display,
                'overlay' => $request->footer_overlay,
                'font_judul' => $request->font_judul,
                'font_judul_weight' => $request->font_judul_weight,
                'font_teks' => $request->font_teks,
            ]);
        } else {
            DB::table('footer_section')->where('event_id', $event_id)->update([
                'background' => $filename,
                'teks_atas' => $request->footer_teks_atas,
                'teks_bawah' => $request->footer_teks_bawah,
                'perataan' => $request->footer_perataan,
                'container' => $request->footer_container,
                'color_teks_atas' => $footer_teks_color_atas,
                'color_teks_bawah' => $footer_teks_color_bawah,
                'display' => $request->footer_display,
                'overlay' => $request->footer_overlay,
                'font_judul' => $request->font_judul,
                'font_judul_weight' => $request->font_judul_weight,
                'font_teks' => $request->font_teks,
            ]);
        }
    }

    public function deleteGuestBook($id)
    {
        try {
            $guest = GuestBook::find($id);
            $guest->delete($guest);
            LogActivity::addToLog('Berhasil hapus ucapan.','Hapus ucapan.');
            return redirect()->back()->with([
                'success' => 'Berhasil menghapus ucapan.'
            ]);
        } catch (\Throwable $th) {
            LogActivity::addToLog('Error: ' .$th->getMessage(),'Delete Ucapan');
            return redirect()->back()->with([
                'error' => $th->getMessage()
            ]);
        }
    }
    

}
