<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideAddRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => "required|unique:slides,title,".$this->id,
            'image' => "required"
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "Tiêu để không được để trống",
            'image.required' => "Hình ảnh không được bỏ trống",
            'title.unique' => "Tiêu đề không được trùng",
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
