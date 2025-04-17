<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhilosophyRequest extends FormRequest
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
            'title' => 'required|string',
            'icon' => 'required|string',
              'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'required|string',
            'status' => 'required|string',

        ];
    }
}
