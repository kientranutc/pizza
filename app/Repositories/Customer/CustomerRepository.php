<?php
namespace App\Repositories\Customer;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class  CustomerRepository implements CustomerRepositoryInterface
{
    public function all()
    {
        return Customer::all();
    }

    public function find($id)
    {
        return Customer::find($id);
    }

    public function save($data)
    {
        $customer = new Customer();
        if (isset($data['name'])) {
            $customer->username = $data['name'];
        }
        if (isset($data['fullname'])) {
            $customer->fullname = $data['fullname'];
        } else {
            $customer->fullname = '';
        }
        if (isset($data['email'])) {
            $customer->email = $data['email'];
        }
        if (isset($data['phone'])) {
            $customer->phone = $data['phone'];
        }
        if (isset($data['address'])) {
            $customer->address = $data['address'];
        } else {
            $customer->address = '';
        }
        if (isset($data['password'])) {
            $customer->password = md5($data['password']);
        }
        $customer->save();
        return $customer->id;
    }

    public function update($id,$data)
    {

    }

    public function delete($id)
    {

    }

    public function checkNameExist($id,$name)
    {

    }

    public function loginCustomer($phone, $password)
    {
        return Customer::where('phone', $phone)
                        ->where('password', md5($password))
                        ->count();
    }
    public function getInfoLogin($phone)
    {
        return Customer::where('phone', $phone)->first();
    }
    public function  getAccountCustomer()
    {
        return Customer::whereNotNull('password')->orderBy('created_at', 'DESC')
                    ->get();
    }
}