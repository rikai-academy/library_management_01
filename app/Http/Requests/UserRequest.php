<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $validation_user = [
            'name' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
        ];

        if ($this->getMethod() == 'POST') {
            $validation_user +=
                [
                    'email' => [
                        'required',
                        'unique:users,email,' . $this->id . ''
                    ],
                    'password' => [
                        'required',
                        'min:6',
                        'confirmed',
                    ]
                ];
        } else {
            $validation_user += ['password' => ['confirmed']];
        }
        return $validation_user;
    }

    public function messages()
    {
        return [
            'name.required' => __('message.val_name'),
            'email.email' => __('message.val_email'),
            'email.required' => __('message.val_email_required'),
            'email.unique' => __('message.email_unique'),
            'password.required' => __('message.password_required'),
            'password.min' => __('message.val_password'),
            'password_confirmation.same' => __('message.val_password_confirm'),
            'phone.required'=> __('message.val_phone'),
            'address.required' => __('message.val_address')
        ];
    }
}
?>
