<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'order.name' => 'required|max:255',
            'order.surname' => 'required|max:255',
            'order.full_address' => 'required|max:500',
            'order.city' => 'required|max:255',
            'order.street' => 'required|max:255',
            'order.zip_code' => 'required|max:6',
            'order.phone_number' => 'required|max:20',
            'order.email' => 'required|max:255',
        ];
    }
}
