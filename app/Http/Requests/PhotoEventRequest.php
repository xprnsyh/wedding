<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PhotoEventRequest extends FormRequest
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
            'name' => 'required|string',
            'caption' => 'required',
            'date' => 'required',
            'photo' => 'required|max:2560|image|mimes:png,jpg'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tulis nama gambar.',
            'caption.required' => 'Tulis caption gambar.',
            'date.required' => 'Pilih tanggal untuk gambar.',
            'photo.required' => 'Lampirkan gambar.',
            'photo.image' => 'Format file gambar png/jpg.',
            'photo.mimes' => 'Format file gambar png/jpg.',
            'photo.max' => 'Ukuran file maksimal 2,5MB.'
        ];
    }
}
