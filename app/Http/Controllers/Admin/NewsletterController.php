<?php

namespace App\Http\Controllers\Admin;

use App\ContactGroup;
use App\Http\Controllers\Controller;
use App\Mail\Newsletter as MailNewsletter;
use App\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $newsletters = Newsletter::all();
        $failed_newsletter = DB::table('failed_newsletter')->where('email', '!=', null)->get();
        if ($failed_newsletter->count() < 1) {
            $failed_newsletter == null;
        }
        // dd($failed_newsletter->count());
        return view('admin.newsletter.index', [
            'newsletters' => $newsletters,
            'failed_newsletter' => $failed_newsletter
        ]);
    }
    public function create()
    {
        $contact_groups = ContactGroup::all();
        return view('admin.newsletter.create', [
            'contact_groups' => $contact_groups
        ]);
    }
    public function store()
    {
        $failed_newsletter = DB::table('failed_newsletter')->where('email', '!=', null)->get();
        if ($failed_newsletter->count() < 1) {
            $failed_newsletter == null;
        }
        $id = Newsletter::latest('id')->first();
        $latest_id = $id->id + 1;
        request()->validate([
            'contact_group' => 'required',
            'contact_email' => 'required',
            'subject' => 'required',
            'body' => 'required'
        ]);
        Newsletter::create([
            'contact_group_id' => request()->contact_group,
            'contact_list' => request()->contact_email,
            'subject' => request()->subject,
            'content' => request()->body
        ]);
        $subject = request()->subject;
        $body = request()->body;
        $mails = explode(",", request()->contact_email);
        foreach ($mails as $mail) {
            \App\Jobs\Newsletter::dispatch($mail, $subject, $body, $latest_id);
        }
        // Mail::bcc($mails)->send(new MailNewsletter($subject, $body));
        return redirect()->back()->with('success', "Newsletter created successfully!");
    }
    public function show($id)
    {
        $newsletter = Newsletter::where('id', $id)->first();
        $mails = explode(",", $newsletter->contact_list);
        $failed_newsletter = DB::table('failed_newsletter')->where('newsletter_id', $id)->get();
        // dd($failed_newsletter);
        return view('admin.newsletter.show', ['newsletter' => $newsletter, 'mails' => $mails, 'failed_newsletter' => $failed_newsletter]);
    }
    public function storeGroupContact()
    {
        request()->validate([
            'group_name' => 'required',
            'contact' => 'required',
        ]);
        ContactGroup::create([
            'group_name' => request()->group_name,
            'contact' => request()->contact,
        ]);
        return redirect()->back()->with('success', "Berhasil membuat contact group");
    }

    public function retryQueueStore()
    {
        $FailedNewsletter = DB::table('failed_newsletter')->get();
        $sendedAll = DB::table('failed_newsletter')->where('email_sended', '!=', null)->get();
        if ($FailedNewsletter->count() == $sendedAll->count()) {
            DB::table('failed_newsletter')->delete();
        } else {
            DB::table('failed_newsletter')->where('email', '!=', null)->delete();
            Artisan::call('queue:retry all');
        }

        return redirect()->back();
    }
}
