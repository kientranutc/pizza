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

    }

    public function update($id,$data)
    {

    }

    public function delete($id)
    {

    }
}