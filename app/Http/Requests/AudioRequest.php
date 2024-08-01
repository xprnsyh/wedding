<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AudioRequest extends FormRequest
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
            'name' => 'required|unique:audio',
            'file_audio' => 'required|mimes:mp3|max:3001'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Kolom nama lagu wajib diisi.',
            'name.unique' => 'Judul lagu sudah ada. Tulis judul lagu yang berbeda.',
            'file_audio.required' => 'Wajib lampirkan file lagu.',
            'file_audio.mimes' => 'Format file hanya mp3.',
            'file_audio.max' => 'Ukuran maksimal file sebesar 3MB.'
        ];
    }
}
