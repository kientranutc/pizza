<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\ShoppingCart\ShoppingCartRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShoppingCartController extends Controller
{
    public function __construct(ShoppingCartRepositoryInterface $cart)
    {
        $this->cart = $cart;
    }

    public  function  addCart(Request $request)
    {
        $this->cart->addCart($request->all()['id']);
        return response()->json(['msg'=>'add cart success']);
    }
}
