<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
;        return [
            'title'       => "required|unique:blogs,title,".$this->id,
            'teaser'      => 'required|min:10|max:255',
            'content'     => 'required|min:30',
        ];
    }

    public function messages()
    {
        return [
            'title.unique'         => "Tiêu đề không được trùng",
            'title.required'       => 'Tiêu đề không được để trống',
            'teaser.required'      => 'Giới thiệu ngắn không được để trống.',
            'teaser.min'           => 'Giới thiệu ngắn không được ít hơn :min ký tự.',
            'teaser.max'           => 'Giới thiệu ngắn không được lớn hơn :max ký tự.',
            'content.required'     => 'Nội dung không được để trống.',
            'content.min'          => 'Nội dung không được ít hơn :min ký tự.',
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
