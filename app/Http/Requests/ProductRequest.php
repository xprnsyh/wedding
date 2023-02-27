<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
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
            'name' => 'required|string|unique:products',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:50000'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama produk wajib diisi.',
            'name.unique' => 'Nomor produk sudah ada. Tulis nama produk yang berbeda.',
            'category_id.required' => 'Kategori wajib dipilih,',
            'description.required' => 'Kolom deskripsi wajib diisi,',
            'price.required' => 'Kolom harga wajib diisi',
            'price.numeric' => 'Harga hanya angka',
            'price.min' => 'Harga minimal 50.000',
        ];
    }
}
