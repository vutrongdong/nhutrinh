<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => "required",
            'description'=> 'required|min:10|max:255',
            'name'     => 'required|min:10|max:30',
            'address'     => 'required',
            'phone'     => 'required',
            'email'     => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "Tiêu đề không được trống",
            'description.required'      => 'Mô tả ngắn không được để trống.',
            'description.min'      => 'Mô tả ngắn không được ít hơn :min ký tự.',
            'description.max'      => 'Mô tả ngắn không được lớn hơn :max ký tự.',
            'name.required'       => 'Tên không được để trống.',
            'name.min'           => 'Tên không được ít hơn :min ký tự.',
            'name.max'           => 'Giới thiệu ngắn không được lớn hơn :max ký tự.',
            'address.required'     => 'Địa chỉ không được để trống.',
            'phone.required'          => 'Số điện thoại không được để trống.',
            'email.required'          => 'Email không được để trống.',
            'email.email'          => 'Email phải đúng định dạng.',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
