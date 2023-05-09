<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChapterFormRequest extends FormRequest
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
            'IDbook' => [
                'required',
                'string'
            ],
            'IDchap' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string'
            ],
            'chapname' => [
                'required',
                'string'
            ],
            'content' => [
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
        ];
    }
}
