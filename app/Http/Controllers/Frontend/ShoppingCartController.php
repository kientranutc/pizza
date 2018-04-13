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

    public function updateCart(Request $request)
    {
        $this->cart->updateCart($request->get('id'), $request->get('qty'));
        return response()->json(['msg'=>'update cart success']);
    }

    public function delete(Request $request)
    {
        $this->cart->deleteCart($request->get('id'));
        if (\Cart::count()>0) {
            return response()->json(['msg' => 'delete cart success']);
        } else {
            return 1;
        }
    }

    public function listOrder()
    {
        if (\Cart::count()>0) {
            $dataOrder = $this->cart->showCart();
            $stt = 0;
            return view('frontend.list_order', compact('stt','dataOrder'));
        } else {
            return redirect('/');
        }
    }

}
