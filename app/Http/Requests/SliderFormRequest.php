<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderFormRequest extends FormRequest
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
            'IDslider' => [
                'required',
                'string'
            ],
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'descript' => [
                'required',
                'string',
                'max:800'
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpge,png'
            ],
        ];
    }
}
