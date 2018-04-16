<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function  __construct(ProductRepositoryInterface $product)
    {
        $this->product = $product;
    }
    public function  index(Request $request)
    {
        $productMaxStar = $this->product->getProductStar();
        $stt = 0;
        return view('backend.report.product_rate_star',compact('stt', 'productMaxStar'));
    }
}
