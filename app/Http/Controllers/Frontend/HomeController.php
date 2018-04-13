<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\News\NewsRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct(ProductRepositoryInterface $product, NewsRepositoryInterface $news)
    {
        $this->product = $product;
        $this->news = $news;
    }

    public function  index()
    {
        $productWish = $this->product->getListWish(1);
        $saleService = $this->news->getService(1,4)->toArray();
        return view('frontend.home', compact('productWish', 'saleService'));
    }

}
