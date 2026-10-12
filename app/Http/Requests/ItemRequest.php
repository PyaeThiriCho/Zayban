<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code_no' => ['required'],
            'name' => ['required'],
            'image' => ['required'],
            'price' => ['required'],
            'discount' => ['required'],
            'in_stock' => ['required'],
            'category_id' => ['required'],
            'description' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'code_no.required' => 'Code_No is required',
            'name.required' => 'Name is required',
        ];
    }
}
