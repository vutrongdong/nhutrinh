<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:32|unique:users,name,'.$this->id,
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
        ];
    }
}
