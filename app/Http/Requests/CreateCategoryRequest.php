<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCategoryRequest extends Request
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
                'name' => 'required|unique:categories|max:255',
        ];
    }
    public function messages()
    {
        return [
                'name.required' => 'Tên danh mục cần nhập',
                'name.unique'  => 'Danh mục đã tồn tại',
                'name.max'  => 'Tên danh mục vượt quá 255 ký tự',

        ];
    }
}
