<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateProductRequest extends Request
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
            'name' => 'required|max:255',
            'image' => 'required|max:255',
            'price' => 'required|integer',
            'sale' => 'required|integer|between:0,100',
            'category_id' =>'required|not_in:0'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm cần nhập',
            'name.max'  => 'Tên sản phẩm vượt quá 255 ký tự',
            'image.required' => 'Ảnh sản phẩm cần nhập',
            'image.max'  => 'Độ dài đường dẫn ảnh sản phẩm vượt quá 255 ký tự',
            'price.required' => 'Giá sản phẩm cần nhập',
            'price.integer' => 'Giá sản phẩm là kiểu số',
            'sale.required' => 'Giảm giá sản phẩm cần nhập',
            'sale.integer' => 'Giảm giá sản phẩm là kiểu số nguyên',
            'sale.between'  => 'Giảm giá từ 0 đến 100 %',
            'category_id.required' => 'Danh mục sản phẩm cần nhập',
            'category_id.not_in' => 'Bạn chưa chọn danh mục sản phẩm'
        ];
    }
}
