<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\TemplateMessage;
use Illuminate\Http\Request;

class TextController extends Controller
{
    public function indexTemplate($event_id)
    {
        $text_template = TemplateMessage::where('event_id', $event_id)->first();

        return view('customer.event.detail.template-message', [
            'text_template' => $text_template
        ]);
    }

    public function storeTemplate(Request $request)
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
