<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Customer\CustomerRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class AccountController
 * @package App\Http\Controllers\Frontend
 */
class AccountController extends Controller
{
    /**
     * AccountController constructor.
     * @param CustomerRepositoryInterface $customer
     */
    public function  __construct(CustomerRepositoryInterface $customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.register');
    }

    /**
     * @param Requests\CreateCustomerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function  createAccount(Requests\CreateCustomerRequest $request)
    {
        $this->customer->save( $request->except('_token'));
        return redirect()->back()->with('success','Bạn đã tạo tài khoản thành công!');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFormLogin()
    {
        return view('frontend.login_customer');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function  processLoginCustomer(Request $request)
    {
        if($this->customer->loginCustomer($request->get('phone'), $request->get('password'))>0) {
            $dataLogin = $this->customer->getInfoLogin($request->get('phone'));
            session(['login-customer'=>[
                'id' => $dataLogin->id,
                'fullname' => $dataLogin->fullname,
                'username' => $dataLogin->username,
                'email' => $dataLogin->email,
                'address' => $dataLogin->address,
                'phone' => $dataLogin->phone
            ]]);
            return redirect()->back()->with('success', 'Bạn đăng nhập thành công');
        } else {
            return redirect()->back()->withErrors('Lỗi đăng nhập');
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logoutCustomer()
    {
        session()->forget('login-customer');
        return redirect()->back();
    }
}
