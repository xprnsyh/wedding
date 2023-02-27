<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BankRequest extends FormRequest
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
            'name' => 'required',
            'bank_name' => 'required',
            'account_number' => 'required|unique:banks',
            'logo_bank' => 'required|file|mimes:jpeg,jpg,png|max:1024'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Kolom nama rekening wajib diisi.',
            'bank_name.required' => 'Kolom nama bank wajib diisi,',
            'account_number.required' => 'Kolom nomor rekening wajib diisi,',
            'account_number.unique' => 'Nomor rekening sudah ada. Tulis nomor rekening yang berbeda.',
            'logo_bank.required' => 'Logo bank wajib dilampirkan',
            'logo_bank.mimes' => 'Format file : JPEG,JPG,PNG',
            'logo_bank.max' => 'Maksimal ukuran file 1MB'
        ];
    }
}
