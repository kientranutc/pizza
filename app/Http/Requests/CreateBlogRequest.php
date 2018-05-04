<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateBlogRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:blog|max:255',
            'image' => 'required|max:255',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tên dịch vụ cần nhập',
            'title.unique'  => 'dịch vụ đã tồn tại',
            'title.max'  => 'Tên dịch vụ vượt quá 255 ký tự',
            'image.required' => 'Ảnh sản phẩm cần nhập',
            'image.max'  => 'Độ dài đường dẫn ảnh dịch vụ vượt quá 255 ký tự',
        ];
    }
}
