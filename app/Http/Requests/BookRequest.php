<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|string|max:100',
            'pages' => 'required|integer',
            'language' => 'required|string|max:20',
            'publication_date' => 'required|date',
            'price' => 'required|integer',
            'image' => 'mimes:jpg,jpeg,png,bmp|max:2048'
        ];
    }
}
