<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateNewsRequest extends Request
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
            'type_id' =>'required|not_in:0'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tên dịch vụ cần nhập',
            'title.max'  => 'Tên dịch vụ vượt quá 255 ký tự',
            'image.required' => 'Ảnh sản phẩm cần nhập',
            'image.max'  => 'Độ dài đường dẫn ảnh dịch vụ vượt quá 255 ký tự',
            'type_id.required' => 'Loại dịch vụ cần nhập',
            'type_id.not_in' => 'Bạn chưa chọn loại dịch vụ sản phẩm'
        ];
    }
}
