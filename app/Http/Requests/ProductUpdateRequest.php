<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => "required|unique:products,title,".$this->id,
            'code' => "required|unique:products,code,".$this->id,
            'price' => "required|numeric",
        ];
    }

    public function messages()
    {
        return [
            'price.numeric' => "Giá bán phải là số.",
            'price.required' => "Giá bán không được để trống.",
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
