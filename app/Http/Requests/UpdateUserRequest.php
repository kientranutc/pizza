<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateUserRequest extends Request
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
            'fullname'=>'required|max:255',
            'password'=>'max:16|min:6',
            'c_password'=> 'same:password',
            'current_password' => 'required',
            'role_id' =>'required|not_in:0'
        ];
    }
    public function messages()
    {
        return [

            'fullname.required' => 'Họ tên không được để trống.',
            'fullname.max' => 'Họ và tên lớn hơn 255 ký tự.',
            'current_password.required' => 'Mật khẩu hiện tại không để trống',

            'password.max' => 'Mật khẩu nhỏ hơn 16 ký tự.',
            'password.min' => 'Mật khẩu lớn hơn 6 ký tự.',
            'c_password.same' => 'Nhập lại mật khẩu không đúng.',
            'role_id.required' => 'Quyền người dùng cần nhập',
            'role_id.not_in' => 'Bạn chưa chọn quyền sản phẩm'
        ];
    }
}
