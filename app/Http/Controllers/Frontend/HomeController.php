<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\News\BlogRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function __construct(ProductRepositoryInterface $product, BlogRepositoryInterface $news)
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
