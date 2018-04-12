<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Auth;

class ProcessAuthController extends Controller
{
    public function  __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect('/admin');
        } else {
            return view('backend.login');
        }
    }
    public function processLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (($this->user->checkEmailAndActiveAccount($email))>0){
            if ($this->user->checkAccountActive($email)->active == 0) {
                if (Auth::attempt(['email' => $email, 'password' => $password],true)) {
                    return redirect('/admin');
                }
                else{
                    return redirect()->back()->withErrors("Mật khẩu hoặc email không đúng")->withInput($request->all());
                }
            } else {
                return redirect()->back()->withErrors("Tài khoản đã bị khóa liên hệ với quản trị")->withInput($request->all());
            }

        } else {
            return redirect()->back()->withErrors("Email chưa tồn tại")->withInput($request->all());
        }


    }
    public function  processLogout()
    {
        Auth::logout();
        return redirect('login');
    }
}
