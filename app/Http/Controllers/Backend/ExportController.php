<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\Export\ExportRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Support\Helper;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExportController extends Controller
{
    public function  __construct(ExportRepositoryInterface $export, ProductRepositoryInterface $product,
                                 OrderDetailRepositoryInterface $orderDetail, OrderRepositoryInterface $order)
    {
        $this->export = $export;
        $this->product = $product;
        $this->orderDetail = $orderDetail;
        $this->order = $order;
        \view::shared('helper', new Helper());
    }

    /**
     *
     */
    public function  exportProductStar()
    {
        $data = $this->product->getProductStar();
        $view = "backend.export.product_star";
        $this->export->exportProductStar($data, $view);
    }

    public function exportProductNoOrder(Request $request)
    {
        $date = $request->get('date', -1);
        if ($request->has('date') &&  $date != -1 && array_key_exists($date,Config('constant.select_date'))) {
            $dateFormat = helper::getTimeSearch(1, $date, '', '');
            $dataProductNoOrder = $this->product->getProductNoOrder($dateFormat['start'], $dateFormat['end']);
            $view = "backend.export.product_no_order";
            $this->export->exportProductNoOrder($date, $dataProductNoOrder, $view);
        } else {
            return redirect()->back();
        }
    }

    public function  exportSummaryOrder(Request $request)
    {
        $date = $request->get('date', -1);
        if ($request->has('date') &&  $date != -1 && array_key_exists($date,Config('constant.select_date'))) {
            $dateFormat = helper::getTimeSearch(1, $date, '', '');
            $dataSummaryOrder = $this->orderDetail->reportSummaryOrder($dateFormat['start'], $dateFormat['end']);
            $view = "backend.export.summary_order";
            $this->export->exportSummaryOrder($date, $dataSummaryOrder, $view);
        } else {
            return redirect()->back();
        }
    }

    public function  exportOrder($id)
    {
        $dataDetail = $this->orderDetail->all($id);
        $dataOrder = $this->order->getOrder($id);
        $data=[
            'id' => $dataOrder['id'],
            'fullname' => $dataOrder['customer_name'],
            'date_order' => $dataOrder['date_order'],
            'total' => $dataOrder['total'],
            'content' => $dataDetail
        ];
        $view = "backend.export.order";
        $this->export->exportProductStar($data, $view);
    }
}
