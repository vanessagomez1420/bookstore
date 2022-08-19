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
            'title'=>'required|string|max:100|',
            'isbn'=>'required|string|max:50|',
            'pages'=>'required|integer',
            'format'=>'required|string|max:500|',
            'sypnosis'=>'required|string|max:200|',
            'language'=>'required|string|max:20|',
            'publication_date'=>'required|date|',
            'price'=>'required|integer',
            'publisher_id'=>'required|integer|min:1',
            'autor'=>'required|array'
        ];
    }
}
