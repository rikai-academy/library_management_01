<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BorrowRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|not_in:0',
        ];
    }

    public function messages()
    {
        return [
            'user_id.not_in' => __('message.return_mess_user'),
        ];
    }
}
