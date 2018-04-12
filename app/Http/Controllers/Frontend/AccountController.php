<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Customer\CustomerRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function  __construct(CustomerRepositoryInterface $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {
        return view('frontend.register');
    }

    public function  createAccount(Requests\CreateCustomerRequest $request)
    {
        $this->customer->save( $request->except('_token'));
        return redirect()->back()->with('success','Bạn đã tạo tài khoản thành công!');
    }

    public function showFormLogin()
    {
        return view('frontend.login_customer');
    }
    public function  processLoginCustomer(Request $request)
    {
        if($this->customer->loginCustomer($request->get('phone'), $request->get('password'))>0) {
            $dataLogin = $this->customer->getInfoLogin($request->get('phone'));
            session(['login-customer'=>[
                'id' => $dataLogin->id,
                'username' => $dataLogin->username,
                'email' => $dataLogin->email,
                'phone' => $dataLogin->phone
            ]]);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    public function logoutCustomer()
    {
        session()->forget('login-customer');
        return redirect()->back();
    }
}
