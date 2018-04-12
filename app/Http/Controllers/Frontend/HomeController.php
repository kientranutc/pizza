<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct(ProductRepositoryInterface $product)
    {
        $this->product = $product;
    }

    public function  index()
    {
        dd($this->product->getListWish());
        return view('frontend.home');
    }
}
