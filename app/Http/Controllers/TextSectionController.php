<?php

namespace App\Http\Controllers;

use App\Models\TemplateMessage;
use App\Models\TextSection;
use Illuminate\Http\Request;

class TextSectionController extends Controller
{
    public function storeQuote(Request $request)
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

    public function storeTitle(Request $request)
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

    
}
