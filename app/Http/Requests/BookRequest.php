<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>[
                'required',
            ],
            'quantity'=>[
                'required',
            ],
            'price'=>[
                'required',
            ],
            'publisher_id'=>[
                'required',
            ],
            'category_id'=>[
                'required',
            ],
            'author_id'=>[
                'required',
            ],
        ];
    }
}
