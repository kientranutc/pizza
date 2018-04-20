<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Support\Helper;
use ClassPreloader\Config;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function  __construct(ProductRepositoryInterface $product, OrderDetailRepositoryInterface $orderDetail)
    {
        $this->product = $product;
        $this->orderDetail = $orderDetail;
        \view::shared('helper', new Helper());
    }
    public function  index(Request $request)
    {
        $stt = 0;
        $productMaxStar = $this->product->getProductStar();
        return view('backend.report.product_rate_star',compact('stt', 'productMaxStar'));
    }

    public function getProductNoOrder(Request $request)
    {
        $date = $request->get('date', -1);
        $dataProductNoOrder = [];
        $stt = 0;
        if ($request->has('date') &&  $date != -1 && array_key_exists($date, Config('constant.select_date'))) {
            $dateFormat = helper::getTimeSearch(1, $date, '', '');
            $dataProductNoOrder = $this->product->getProductNoOrder($dateFormat['start'], $dateFormat['end']);
        }
        return view('backend.report.product_no_order', compact('stt', 'dataProductNoOrder'));
    }

    /**
     * @todo display and export report summary order
     * @author
     * @param Request $request
     * @return mixed
     */
    public function  summaryOrder(Request $request)
    {
        $date = $request->get('date', -1);
        $dataSummaryOrder = [];
        $stt = 0;
        if ($request->has('date') &&  $date != -1 && array_key_exists($date, Config('constant.select_date'))) {
            $dateFormat = helper::getTimeSearch(1, $date, '', '');
            $dataSummaryOrder = $this->orderDetail->reportSummaryOrder($dateFormat['start'], $dateFormat['end']);
        }
        return view('backend.report.summary_order',  compact('stt', 'dataSummaryOrder'));
    }
}
