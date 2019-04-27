<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:users,name|min:3|max:32',
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
            'name.required' => 'Tài khoản không được để trống',
            'name.unique' => 'Tài khoản này đã tồn tại trên hệ thống',
            'name.min' => 'Tài khoản không được ít hơn :min ký tự.',
            'name.max' => 'Tài khoản không được nhiều hơn :max ký tự.',
            'password.required' => 'Mật khẩu không được để trống',
            'password.required_with' => 'Mật khẩu không khớp với thông tin cần xác thực',
            'password.same' => 'Mật khẩu không khớp với thông tin cần xác thực',
            'password.min' => 'Mật khẩu không được ít hơn :min ký tự.',
            'password.max' => 'Mật khẩu không được nhiều hơn :max ký tự.',
        ];
    }
}
