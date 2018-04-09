<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUserRequest extends Request
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
            'name'=>'required|unique:users|max:255',
            'email' =>'required|unique:users|max:255',
            'fullname'=>'required|max:255',
            'password'=>'required|max:16|min:6',
            'c_password'=> 'required|same:password',
            'role_id' =>'required|not_in:0'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Username không được để trống.',
            'name.unique' => 'username đã tồn tại.',
            'name.max' => 'Username vượt quá 255 ký tự.',
            'email.required' => 'Email không được để trống.',
            'email.unique' => 'Email đã tồn tại.',
            'email.max' => 'Email lớn hơn 255 ký tự.',
            'fullname.required' => 'Họ tên không được để trống.',
            'fullname.max' => 'Họ và tên lớn hơn 255 ký tự.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.max' => 'Mật khẩu nhỏ hơn 16 ký tự.',
            'password.min' => 'Mật khẩu lớn hơn 6 ký tự.',
            'c_password.required' => 'Nhập lại mật khẩu không được để trống.',
            'c_password.same' => 'Nhập lại mật khẩu không đúng.',
            'role_id.required' => 'Quyền người dùng cần nhập',
            'role_id.not_in' => 'Bạn chưa chọn quyền'
        ];
    }
}
