<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'courseName' => 'required|string',
            'courseHeading' => 'required|string',
            'courseText' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'rating' => 'required|numeric',
            'duration' => 'required|string',
            'endDuration' => 'required|string',
            'teacherName' => 'required|string',
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',

        ];
    }
}
