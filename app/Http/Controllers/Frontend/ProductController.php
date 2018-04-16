<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Support\Helper;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * ProductController constructor.
     * @param ProductRepositoryInterface $product
     * @param CommentRepositoryInterface $comment
     */
    public function  __construct(ProductRepositoryInterface $product, CommentRepositoryInterface $comment)
    {
        $this->product = $product;
        $this->comment = $comment;

    }

    public function index($slug)
    {
        $productDetail = $this->product->findAttribute('slug', $slug);
        $dataComment = $this->comment->getListComment($productDetail->id);
        $helper = new Helper();
        return view('frontend.product_detail', compact('productDetail', 'dataComment', 'helper'));
    }
    public function  wishList()
    {
        $productWish = $this->product->getListWish(0);
        return view('frontend.wishList', compact('productWish'));
    }
}
