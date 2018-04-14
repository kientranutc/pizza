<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function  __construct(ProductRepositoryInterface $product)
    {
        $this->product = $product;
    }

    public function index($slug)
    {
        $productDetail = $this->product->findAttribute('slug', $slug);
        return view('frontend.product_detail', compact('productDetail'));
    }
}
