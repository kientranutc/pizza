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

    public function changeStatusOrder($id, $status)
    {
        $order = Order::find($id);
        if ($order) {
            if ($status == 0) {
                $order->status = 1;
            } else {
                $order->status = 0;
            }
            return $order->save();
        } else {
            return false;
        }

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