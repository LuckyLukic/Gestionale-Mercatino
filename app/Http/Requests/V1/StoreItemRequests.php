<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequests extends FormRequest
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
            'name' => 'required|string',
            'category' => 'required',
            'quantity' => 'required|integer|min:1',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|between:0,9999999.99',
            'user_id' => 'required'
        ];
    }
}
