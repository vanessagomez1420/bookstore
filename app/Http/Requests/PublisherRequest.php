<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublisherRequest extends FormRequest
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
            'name' => 'required|max:100|string',
            'address' => 'required|max:150|string',
            'city' => 'required|max:100|string',
            'site' => 'required|max:100|string',
            'image' => 'mimes:jpg,jpeg,png,bmp|max:2048',
        ];
    }
}
