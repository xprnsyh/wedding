<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OrderRequest extends FormRequest
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
            'customer_name' => 'required|string|max:100',
            'customer_phone' => 'required',
            'customer_email' => 'required|email',
            'customer_address' => 'required',
            'product' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'customer_name.required' => 'Tulis nama customer.',
            'customer_name.max' => 'Maksimal 100 karakter,',
            'customer_phone.required' => 'Tulis no HP customer.',
            'customer_email.required' => 'Tulis email customer.',
            'customer_email.email' => 'Format email.',
            'customer_address.required' => 'Tulis alamat customer.',
            'product.required' => 'Pilih paket produk.'
        ];
    }
}
