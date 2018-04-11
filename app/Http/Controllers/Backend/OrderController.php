<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\Order\OrderRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function __construct(OrderRepositoryInterface $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        $dataOrder = $this->order->all();
        $stt = 0;
        return view('backend.order.index', compact('stt', 'dataOrder'));
    }

    public function  showDetail($id)
    {

    }
}
