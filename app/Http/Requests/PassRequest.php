<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassRequest extends FormRequest
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
            'passType' => 'required|nullable|integer|min:0',
            'passStartDate' => 'required|date|after:today'
        ];
    }
}
