<?php
namespace App\Repositories\Customer;

interface CustomerRepositoryInterface
{
    public function all();

    public function find($id);

    public function save($data);

    public function update($id,$data);

    public function delete($id);

    public function checkNameExist($id,$name);

    public function loginCustomer($phone, $password);

    public function getInfoLogin($phone);

    public function  getAccountCustomer();


}