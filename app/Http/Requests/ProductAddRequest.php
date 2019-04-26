<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slug' => "required|unique:products,slug,".$this->id,
            'title' => "required|unique:products,title,".$this->id,
            'code' => "required|unique:products,code,".$this->id,
        ];
    }

    public function messages()
    {
        return [
            'slug.required' => "Tên không dấu không được trống",
            'slug.unique' => "Tên không dấu không được trùng",
            'title.unique' => "Tiêu đề không được trùng",
            'title.required' => "Tiêu đề không được trống",
            'code.unique' => "Mã sản phẩm không được trùng",
            'code.required' => "Mã sản phẩm không được trống",
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
