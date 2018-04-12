<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCustomerRequest extends Request
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
            'email' => 'required|unique:customer|email|max:255',
            'phone' => 'required|unique:customer|max:255',
            'password'=>'required|max:16|min:6',
            'c_password'=> 'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống.',
            'name.max' => 'Tên vượt quá 255 ký tự.',
            'email.required' => 'Email không được để trống.',
            'email.unique' => 'Email đã tồn tại.',
            'email.email' => 'Sai định dạng email',
            'email.max' => 'Email lớn hơn 255 ký tự.',
            'phone.required' => 'Email không được để trống.',
            'phone.unique' => 'Phone đã tồn tại.',
            'phone.max' => 'Email lớn hơn 255 ký tự.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.max' => 'Mật khẩu nhỏ hơn 16 ký tự.',
            'password.min' => 'Mật khẩu lớn hơn 6 ký tự.',
            'c_password.required' => 'Nhập lại mật khẩu không được để trống.',
            'c_password.same' => 'Nhập lại mật khẩu không đúng.',

        ];
    }
}
