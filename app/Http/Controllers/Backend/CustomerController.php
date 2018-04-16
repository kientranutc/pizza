<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\Customer\CustomerRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function  __construct(CustomerRepositoryInterface $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {
        $accountCustomer = $this->customer->getAccountCustomer();
        $stt = 0;
        return view('backend.customer.index', compact('stt', 'accountCustomer'));
    }
}
