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
        $order = new Order();
        if (isset($data['date_order'])) {
            $order->date_order = $data['date_order'];
        }
        if (isset($data['note'])) {
            $order->note = $data['note'];
        }
        if (isset($data['total'])) {
            $order->total = $data['total'];
        }
        if (isset($data['customer_id'])) {
            $order->customer_id = $data['customer_id'];
        }
        $order->status = 0;
        $order->save();
        return $order->id;



    }



    public function countOrderDayNow()
    {
        $startDate = date('Y-m-d 00:00:00');
        $endDate   = date('Y-m-d 23:59:59');
        return Order::where('date_order', '>=', $startDate)
            ->where('date_order', '<=', $endDate)
            ->count();
    }

    public function getMoneyOrder()
    {
        return Order::sum('total');
    }

    public function getOrder($id)
    {
         return  Order::select('orders.*', 'customer.fullname as customer_name')
                        ->join('customer', 'orders.customer_id', '=', 'customer.id')
                        ->where('orders.id', $id)->first();

    }
}