<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\Export\ExportRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExportController extends Controller
{
    public function  __construct(ExportRepositoryInterface $export, ProductRepositoryInterface $product)
    {
        $this->export = $export;
        $this->product = $product;
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
}
