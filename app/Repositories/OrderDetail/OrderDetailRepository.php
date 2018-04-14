<?php
namespace App\Repositories\OrderDetail;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class  OrderDetailRepository implements OrderDetailRepositoryInterface
{
    public function all($id)
    {
        return OrderDetail::select('order_detail.*', 'products.name as product_name')
                ->join('products', 'products.id', '=', 'order_detail.product_id')
                ->where('order_detail.order_id', $id)
                ->get();
    }
    public function find($id)
    {

    }

    public function save($data)
    {
        $orderDetail = new OrderDetail();
        if (isset($data['order_id'])) {
            $orderDetail->order_id = $data['order_id'];
        }
        if (isset($data['product_id'])) {
            $orderDetail->product_id = $data['product_id'];
        }
        if (isset($data['price'])) {
            $orderDetail->price = $data['price'];
        }
        if (isset($data['quantity'])) {
            $orderDetail->quantity = $data['quantity'];
        }
        if (isset($data['sale'])) {
            $orderDetail->sale = $data['sale'];
        }
        $orderDetail->save();

    }

    public function update($id,$data)
    {

    }

    public function delete($id)
    {

    }
}