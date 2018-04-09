<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginRequest extends Request
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
            'email' => 'required|email|max:255',
            'password'=>'required|min:6|max:16'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email cần nhập',
            'email.max'  => 'Email vượt quá 255 ký tự',
            'email.email' => 'Sai định dạng email',
            'password.required' => 'Mật khẩu cần nhập',
            'password.max'  => 'Mật khẩu không vượt quá 16 ký tự',
            'password.min' => 'Mật khẩu từ 6 ký tự trở lên',

        ];
    }
}
