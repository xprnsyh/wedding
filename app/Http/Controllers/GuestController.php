<?php

namespace App\Http\Controllers;

use App\Mail\DaftarUser;
use App\Models\Audio;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Event;
use App\Models\GuestBook;
use App\Models\Invite;
use App\Models\PhotoEvent;
use App\Models\Post;
use App\Notifications\UserCreated;
use App\Notifications\UserInvited;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Helpers\LogActivity;

class GuestController extends Controller
{

    public function welcome()
    {
        $blogs = Post::orderBy('created_at', 'DESC')->get();
        LogActivity::addToLog('','landing page');

        return view('welcome', [
            'blogs' => $blogs
        ]);
    }
    public function view($slug)
    {
        $event = Event::where('slug', $slug)->with('audio')->first();
        $data_guestbook = GuestBook::where('event_id', $event->id)->get();

        $photo_event = PhotoEvent::where('event_id', $event->id)->get()->toArray();

        $kalimat = 'Lihat undangan pernikahan ' . $event->nama_lengkap_mempelai_wanita . ' & ' . $event->nama_lengkap_mempelai_pria;
        LogActivity::addToLog($kalimat, 'Lihat Undangan');

        switch ($event->template) {
            case 'Gold':
                return view('guest.preview-gold', [
                    'event' => $event,
                    'data_guestbook' => $data_guestbook,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Soft':
                return view('guest.preview-soft', [
                    'event' => $event,
                    'data_guestbook' => $data_guestbook,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Prime':
                return view('guest.preview-prime', [
                    'event' => $event,
                    'data_guestbook' => $data_guestbook,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Silver':
                return view('guest.preview-silver', [
                    'event' => $event,
                    'data_guestbook' => $data_guestbook,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Chocolate':
                return view('guest.preview-choco', [
                    'event' => $event,
                    'data_guestbook' => $data_guestbook,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Pink':
                return view('guest.preview-pink', [
                    'event' => $event,
                    'data_guestbook' => $data_guestbook,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Crystal':
                return view('guest.preview-crystal', [
                    'event' => $event,
                    'data_guestbook' => $data_guestbook,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Grey':
                return view('guest.preview-grey', [
                    'event' => $event,
                    'data_guestbook' => $data_guestbook,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Bronze':
                return view('guest.preview-bronze', [
                    'event' => $event,
                    'data_guestbook' => $data_guestbook,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Blue':
                return view('guest.preview-blue', [
                    'event' => $event,
                    'data_guestbook' => $data_guestbook,
                    'photo_event' => $photo_event
                ]);
                break;

                // v1-v5
            case 'Camel':
                return view('guest.preview-camel', [
                    'event' => $event,
                    'data_guestbook' => $data_guestbook,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Ruby':
                return view('guest.preview-ruby', [
                    'event' => $event,
                    'data_guestbook' => $data_guestbook,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Goldy':
                return view('guest.preview-goldy', [
                    'event' => $event,
                    'data_guestbook' => $data_guestbook,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Navy':
                return view('guest.preview-navy', [
                    'event' => $event,
                    'data_guestbook' => $data_guestbook,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Natural':
                return view('guest.preview-natural', [
                    'event' => $event,
                    'data_guestbook' => $data_guestbook,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'jawa':
                return view('guest.preview-jawa', [
                    'event' => $event,
                    'data_guestbook' => $data_guestbook,
                    'photo_event' => $photo_event
                ]);
                break;

                // Basic
            case 'Basic':
                return view('guest.preview-basic', [
                    'event' => $event,
                    'data_guestbook' => $data_guestbook,
                    'photo_event' => $photo_event
                ]);
                break;
                // regular
            case 'Regular':
                return view('guest.preview-regular', [
                    'event' => $event,
                    'data_guestbook' => $data_guestbook,
                    'photo_event' => $photo_event
                ]);
                break;
            case 'Custom':
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
                if ($hero !== null && $hero->background !== null) {
                    $this->_cekJenisBackground($hero, $slug, $event);
                }
                if ($invitation !== null && $invitation->background !== null) {
                    $this->_cekJenisBackground($invitation, $slug, $event);
                }
                if ($gallery !== null && $gallery->background !== null) {
                    $this->_cekJenisBackground($gallery, $slug, $event);
                }
                if ($countdown !== null && $countdown->background !== null) {
                    $this->_cekJenisBackground($countdown, $slug, $event);
                }
                if ($maps !== null && $maps->background !== null) {
                    $this->_cekJenisBackground($maps, $slug, $event);
                }
                if ($streaming !== null && $streaming->background !== null) {
                    $this->_cekJenisBackground($streaming, $slug, $event);
                }
                if ($videos !== null && $videos->background !== null) {
                    $this->_cekJenisBackground($videos, $slug, $event);
                }
                if ($_event !== null && $_event->background !== null) {
                    $this->_cekJenisBackground($_event, $slug, $event);
                }
                if ($comment !== null && $comment->background !== null) {
                    $this->_cekJenisBackground($comment, $slug, $event);
                }
                if ($footer !== null && $footer->background !== null) {
                    $this->_cekJenisBackground($footer, $slug, $event);
                }

                return view('event-builder-page', [
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
                ]);
                break;
            default:
                return view('guest.preview-gold', [
                    'event' => $event,
                    'data_guestbook' => $data_guestbook,
                    'photo_event' => $photo_event
                ]);
        }
    }

    public function redirect($id)
    {
        $event = Event::find($id);

        return redirect()->route('see.guestbook', [
            'slug' => $event->slug
        ]);
    }


    public function guestbook($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $data_guestbook = GuestBook::where('event_id', $event->id)->get();

        return view('guest.guestbook', [
            'data_guestbook' => $data_guestbook,
            'event' => $event
        ]);
    }

    public function basiceventpage($slug)
    {
        $event = Event::where('slug', $slug)->with('audio')->first();
        $data_guestbook = GuestBook::where('event_id', $event->id)->get();
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
        // dd($invitation);
        $photo_event = PhotoEvent::where('event_id', $event->id)->get()->toArray();
        if ($hero !== null && $hero->background !== null) {
            $this->_cekJenisBackground($hero, $slug, $event);
        }
        if ($invitation !== null && $invitation->background !== null) {
            $this->_cekJenisBackground($invitation, $slug, $event);
        }
        if ($gallery !== null && $gallery->background !== null) {
            $this->_cekJenisBackground($gallery, $slug, $event);
        }
        if ($countdown !== null && $countdown->background !== null) {
            $this->_cekJenisBackground($countdown, $slug, $event);
        }
        if ($maps !== null && $maps->background !== null) {
            $this->_cekJenisBackground($maps, $slug, $event);
        }
        if ($streaming !== null && $streaming->background !== null) {
            $this->_cekJenisBackground($streaming, $slug, $event);
        }
        if ($videos !== null && $videos->background !== null) {
            $this->_cekJenisBackground($videos, $slug, $event);
        }
        if ($_event !== null && $_event->background !== null) {
            $this->_cekJenisBackground($_event, $slug, $event);
        }
        if ($comment !== null && $comment->background !== null) {
            $this->_cekJenisBackground($comment, $slug, $event);
        }
        if ($footer !== null && $footer->background !== null) {
            $this->_cekJenisBackground($footer, $slug, $event);
        }

        return view('event-builder-page', [
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
        ]);
    }

    public function listEvent()
    {
        $events = Event::with('order')->get();
        return view('story', [
            'events' => $events
        ]);
    }

    function _cekJenisBackground($section, $slug, $event)
    {
        if ($section) {
            $cekbackground = explode('#', $section->background);
        }

        if (count($cekbackground) !== 1) {
            $section->background = $section->background;
        } else {
            $img = $section->background;
            $section->background = 'linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.3)), url(/admin/assets/images/events/builder/' . $slug . '-' . $event->id . '/' . $img . ') center / cover';
        }
    }

    public function demoGold()
    {
        return view('guest.demo-1');
    }

    public function demoSoft()
    {
        return view('guest.demo-2');
    }

    public function demoPrime()
    {
        return view('guest.demo-3');
    }

    public function demoSilver()
    {
        return view('guest.demo-4');
    }

    public function demoChoco()
    {
        return view('guest.demo-5');
    }

    public function demoPink()
    {
        return view('guest.demo-6');
    }

    public function demoCrystal()
    {
        return view('guest.demo-7');
    }

    public function demoGrey()
    {
        return view('guest.demo-8');
    }

    public function demoBronze()
    {
        return view('guest.demo-9');
    }

    public function demoBlue()
    {
        return view('guest.demo-10');
    }

    public function demoV1()
    {
        return view('guest.demo-11');
    }

    public function demoV2()
    {
        return view('guest.demo-12');
    }

    public function demoV3()
    {
        return view('guest.demo-13');
    }

    public function demoV4()
    {
        return view('guest.demo-14');
    }

    public function demoV5()
    {
        return view('guest.demo-15');
    }

    public function demoV6()
    {
        return view('guest.demo-16');
    }

    public function demoV7()
    {
        return view('guest.demo-17');
    }

    public function attending(Request $request, $id)
    {
        $this->validate($request, [
            'email' => 'required|email|email_address',
            'name' => 'required'
        ]);
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
                return redirect()->back()->with([
                    'error' => 'Anda sudah dalam daftar RSVP!'
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
                $kalimat = $user->name . ' diundang ke pernikahan ' . $event->nama_lengkap_mempelai_wanita . ' & ' . $event->nama_lengkap_mempelai_pria;
                LogActivity::addToLog($kalimat, 'Undangan');
                return redirect()->back()->with([
                    'success' => 'Thank you for your attending'
                ]);
            }
        } else {

            $invite = Invite::where('event_id', $id)->where('guest_id', $user->id)->get();

            if ($invite->count() > 0) {
                return redirect()->back()->with([
                    'error' => 'Anda sudah dalam daftar RSVP!'
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
                return redirect()->back()->with([
                    'success' => 'Thank you for your attending'
                ]);
            }
        }
    }

    public function wishes(Request $request, $id)
    {
        $this->validate($request, [
            'email' => 'required|email|email_address',
            'name' => 'required',
            'text' => 'required'
        ]);

        $role_customer = Role::where('name', 'customer')->first();
        $user = User::where('email', $request->email)->first();
        $guest_book = null;

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
            $guest_book = GuestBook::where('event_id', $id)->where('user_id', $user->id)->get();

            if ($guest_book->count() > 0) {
                return redirect()->back()->with([
                    'error' => 'Anda sudah mengucapkan...'
                ]);
            } else {
                $new_guest_book = GuestBook::create([
                    'event_id' => $id,
                    'user_id' => $user->id,
                    'text' => $request->text,
                ]);

                $kalimat = $user->name . ' mengucapkan '. $request->text;
                LogActivity::addToLog($kalimat, 'Mengucapkan via undangan');

                return redirect()->back()->with([
                    'success' => 'Terima kasih...'
                ]);
            }
        } else {

            $invite = GuestBook::where('event_id', $id)->where('user_id', $user->id)->get();

            if ($invite->count() > 0) {
                return redirect()->back()->with([
                    'error' => 'Anda sudah mengucapkan...'
                ]);
            } else {

                $new_guest_book = GuestBook::create([
                    'event_id' => $id,
                    'user_id' => $user->id,
                    'text' => $request->text,
                ]);
                $kalimat = $user->name . ' mengucapkan '. $request->text;
                LogActivity::addToLog($kalimat, 'Mengucapkan via undangan');

                return redirect()->back()->with([
                    'success' => 'Terima kasih...'
                ]);
            }
        }
    }

    public function landingpages()
    {
        return view('guest.landingpages');
    }
}
