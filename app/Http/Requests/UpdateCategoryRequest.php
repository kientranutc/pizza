<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateCategoryRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
                'name' => 'required|max:255',
        ];
    }
    public function messages()
    {
        return [
                'name.required' => 'Tên danh mục cần nhập',
                'name.max'  => 'Tên danh mục vượt quá 255 ký tự',

        ];
    }
}
