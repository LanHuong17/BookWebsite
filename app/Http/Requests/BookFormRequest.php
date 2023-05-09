<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookFormRequest extends FormRequest
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
            'category_id' => [
                'required',
                'integer'
            ],
            'IDauthor' => [
                'required',
                'integer'
            ],
            'IDbook' => [
                'required',
                'string'
            ],
            'bookname' => [
                'required',
                'string'
            ],
            'small_descript' => [
                'required',
                'string'
            ],
            'descript' => [
                'required',
                'string'
            ],
            'img' => [
                'nullable',
                'mimes:jpg,jpeg,png'
            ],
            'status' => [
                'nullable'
            ],
            'trending' => [
                'nullable'
            ]
        ];
    }
}
