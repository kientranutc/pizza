<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\Products\ProductRepositoryInterface;
use App\Support\Helper;
use ClassPreloader\Config;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function  __construct(ProductRepositoryInterface $product)
    {
        $this->product = $product;
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
        if ($request->has('date') &&  $date != -1 && array_key_exists($date,Config('constant.select_date'))) {
            $dateFormat = helper::getTimeSearch(1, $date, '', '');
            $dataProductNoOrder = $this->product->getProductNoOrder($dateFormat['start'], $dateFormat['end']);
        }
        return view('backend.report.product_no_order', compact('stt', 'dataProductNoOrder'));
    }
}
