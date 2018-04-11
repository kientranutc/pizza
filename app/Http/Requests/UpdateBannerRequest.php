<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateBannerRequest extends Request
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
            'title' => 'required|max:255',
            'image' => 'required|max:255',
            'url' =>'required|url'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề banner cần nhập',
            'title.max'  => 'Tiêu đề banner vượt quá 255 ký tự',
            'image.required' => 'Ảnh banner cần nhập',
            'image.max'  => 'Độ dài đường dẫn ảnh banner vượt quá 255 ký tự',
            'url.required' => 'Link liên kết cần nhập',
            'url.url' => 'Link liên kết không hợp lệ'

        ];
    }
}
