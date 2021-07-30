<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RatePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            //
        ];
    }
}
