<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CustomerRequest extends FormRequest
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
            'email' => 'required|unique:users, customers',
            'phone_number' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Wajib ada nama.',
            'email.required' => 'Wajib ada email',
            'email.unique' => 'Email sudah ada.',
            'phone_number.required' => 'Wajib ada no HP.',
            'address.required' => 'Wajib ada alamat.'
        ];
    }
}
