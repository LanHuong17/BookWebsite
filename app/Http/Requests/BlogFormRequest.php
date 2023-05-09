<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogFormRequest extends FormRequest
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
            'IDblog' => [
                'required',
                'string'
            ],
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'content' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string'
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpge,png'
            ],
        ];
    }
}
