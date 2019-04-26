<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => "required|min:3|max:100|unique:categories,title,".$this->id,
            'slug' => "required|unique:categories,slug,".$this->id,
        ];
    }

    public function messages()
    {
        return [
            'slug.unique' => "Tên không dấu không được trùng",
            'title.unique' => "Tiêu đề không được trùng",
            'title.required' => 'Bạn chưa nhập tiêu đề',
            'title.min' => 'Tên kí tự phải nhiều hơn 3',
            'title.max' => 'Tên kí tự phải ít hơn 100'
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
