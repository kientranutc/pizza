<?php
namespace App\Repositories\Order;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class  OrderRepository implements OrderRepositoryInterface
{
    public function all()
    {
        return Order::select('orders.*', 'customer.fullname as customer_name', 'customer.phone as customer_phone',
            'customer.address as customer_address')
            ->join('customer', 'customer.id', '=', 'orders.customer_id')
            ->orderBy('date_order', 'DESC')
            ->get();
    }
    public function find($id)
    {

    }

    public function save($data)
    {

    }

    public function update($id,$data)
    {

    }

    public function delete($id)
    {

    }
}