<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserResetPassRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation'
        ];
    }

    /**
     * Form validation message
     * @return array
     */
    public function messages()
    {
        return [
            'password.required' => 'Mật khẩu không được để trống',
            'password.required_with' => 'Mật khẩu không khớp với thông tin cần xác thực',
            'password.same' => 'Mật khẩu không khớp với thông tin cần xác thực',
            'password.min' => 'Mật khẩu không được ít hơn :min ký tự.',
            'password.max' => 'Mật khẩu không được nhiều hơn :max ký tự.',
        ];
    }
}
