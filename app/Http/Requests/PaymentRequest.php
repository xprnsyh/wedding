<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'no_invoice' => 'required',
            'nama_pengirim' => 'required',
            'rekening_pengirim' => 'required',
            'bank_pengirim' => 'required',
            'tanggal_transfer' => 'required',
            'jumlah_transfer' => 'required',
            'bukti_transfer' => 'required|mimes:jpeg,png,jpg'
        ];
    }

    public function messages()
    {
        return [
            'no_invoice.required' => 'Cantumkan Nomor Invoice Anda.',
            'nama_pengirim.required' => 'Tulis nama pengirim.',
            'rekening_pengirim.required' => 'Tulis nomor rekening pengirim.',
            'bank_pengirim.required' => 'Tulis nama bank pengirim.',
            'tanggal_transfer.required' => 'Pilih tanggal transfer.',
            'jumlah_transfer.required' => 'Cantumkan jumlah transfer.',
            'bukti_transfer.required' => 'Wajib lampirkan foto bukti transfer.',
            'bukti_transfer.mimes' => 'Format gambar : JPEG, JPG, PNG.'
        ];
    }
}
