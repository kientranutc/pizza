<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function __construct(OrderRepositoryInterface $order, OrderDetailRepositoryInterface $orderDetail)
    {
        $this->order = $order;
        $this->orderDetail = $orderDetail;
    }

    public function index()
    {
        $dataOrder = $this->order->all();
        $stt = 0;
        return view('backend.order.index', compact('stt', 'dataOrder'));
    }

    public function  showDetail($id)
    {
        $dataOrderDetail = $this->orderDetail->all($id);
        $stt = 0;
        return view('backend.order.order_detail', compact('stt', 'dataOrderDetail'));
    }
    public function changeStatusOrder($id, $status)
    {
        if ($this->order->changeStatusOrder($id, $status)) {
            return redirect()->route('order.index')->with('success','Cập nhật đơn hàng thành công!');
        } else {
            return redirect()->back()->withErrors('Lỗi cập nhật đơn hàng!');
        }
    }
}
