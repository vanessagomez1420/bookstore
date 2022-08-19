<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'sur_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'citizenship' => 'required|string|max:100',
            'date_of_birth' => 'required|date',
            'bio' => 'required|string|max:191',
            'image' => 'mimes:jpg,jpeg,png,bmp|max:2048'
        ];
    }
}
