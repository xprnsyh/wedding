<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TemplateMessage;
use App\Models\TextSection;
use Illuminate\Http\Request;
use App\Helpers\LogActivity;
use App\Models\Event;
use App\Models\Order;

class TextController extends Controller
{
    public function editTextSection($invoice)
    {
        $order = Order::where('invoice', $invoice)->first();
        $event = Event::where('order_id', $order->id)->first();
        $text = TextSection::where('event_id', $event->id)->first();
        LogActivity::addToLog('Edit halaman event ' . $event->id, 'Akses halaman event');
        return view('admin.event.edit.text', [
            'event' => $event,
            'text' => $text,
        ]);
    }

    public function storeQuote(Request $request, $event_id)
    {
        
        $check_text_section_quote = TextSection::where('event_id',$request->id)
            ->first();
        if ($check_text_section_quote == null) {
            $new_text_section_quote = TextSection::create([
                'event_id' => $request->id,
                'quote' => $request->quote,
            ]);

            return response()->json(['success' => true, 'message' => 'Berhasil membuat Quote Message']);

        } else {
            $check_text_section_quote->quote = $request->quote;
            $check_text_section_quote->save();

            return response()->json(['success' => true, 'message' => 'Berhasil mengupdate Quote Message']);
        }
        
        return response()->json(['success' => false, 'message' => 'Gagal mengupdate Quote Message']);
    }

    public function storeTitle(Request $request, $event_id)
    {
        
        $check_text_section_title = TextSection::where('event_id',$request->id)
            ->first();
        if ($check_text_section_title == null) {
            $new_text_section_title = TextSection::create([
                'event_id' => $request->id,
                'title' => $request->title,
            ]);

            return response()->json(['success' => true, 'message' => 'Berhasil membuat Perkenalan Message']);

        } else {
            $check_text_section_title->title = $request->title;
            $check_text_section_title->save();

            return response()->json(['success' => true, 'message' => 'Berhasil mengupdate Perkenalan Message']);
        }
        
        return response()->json(['success' => false, 'message' => 'Gagal mengupdate Perkenalan Message']);
    }

    public function editMessage($invoice)
    {
        $order = Order::where('invoice', $invoice)->first();
        $event = Event::where('order_id', $order->id)->first();
        $templateMessage = TemplateMessage::where('event_id', $event->id)->first();
        LogActivity::addToLog('Edit halaman event ' . $event->slug, 'Akses halaman event');
        return view('admin.event.edit.message', [
            'event' => $event,
            'templateMessage' => $templateMessage
        ]);
    }

    public function storeTemplate(Request $request, $event_id)
    {
        
        $check_template_message = TemplateMessage::where('event_id',$request->id)
            ->first();
        if ($check_template_message == null) {
            $new_template_message = TemplateMessage::create([
                'event_id' => $request->id,
                'message' => $request->message,
            ]);

            return response()->json(['success' => true, 'message' => 'Berhasil membuat Template Message']);

        } else {
            $check_template_message->message = $request->message;
            $check_template_message->save();

            return response()->json(['success' => true, 'message' => 'Berhasil mengupdate Template Message']);
        }
        
        return response()->json(['success' => false, 'message' => 'Gagal mengupdate Template Message']);
    }

}
