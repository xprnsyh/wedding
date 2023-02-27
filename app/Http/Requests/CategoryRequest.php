<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CategoryRequest extends FormRequest
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
            'name' => 'required|string|unique:categories'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Kolom nama wajib diisi.',
            'name.string' => 'Wajib diisi.',
            'name.unique' => 'Nama tersebut sudah ada di sistem. Tulis nama kategori lain.'
        ];
    }
}
