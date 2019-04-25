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
            'slug' => "unique:products,slug,".$this->id,
            'title' => "unique:products,title,".$this->id,
            'code' => "unique:products,code,".$this->id,
        ];
    }

    public function messages()
    {
        return [
            'slug.unique' => "Tên không dấu không được trùng",
            'title.unique' => "Tiêu đề không được trùng",
            'code.unique' => "Mã sản phẩm không được trùng",
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
