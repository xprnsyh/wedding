<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AngpaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'event_id' => 'required',
            'no_rekening' => 'required',
            'nama_bank' => 'required',
            'nama_penerima' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'event_id.required' => 'Event belum terdaftar',
            'no_rekening.required' => 'Nomor rekening wajib diisi.',
            'nama_bank.required' => 'Nama bank wajib diisi.',
            'nama_penerima.required' => 'Nama penerima wajib diisi.'
        ];
    }
}
