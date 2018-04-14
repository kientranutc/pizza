<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Repositories\ShoppingCart\ShoppingCartRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShoppingCartController extends Controller
{
    public function __construct(ShoppingCartRepositoryInterface $cart,
                                CustomerRepositoryInterface $customer,
                                OrderDetailRepositoryInterface $orderDetail,
                                OrderRepositoryInterface $order
    )
    {
        $this->cart = $cart;
        $this->customer = $customer;
        $this->orderDetail = $orderDetail;
        $this->order = $order;
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

    public function checkout()
    {
        $listCart = $this->cart->showCart();
        return view('frontend.checkout', compact('listCart'));
    }

    public function processCheckOut(Request $request)
    {
        $requestCustomer =$request->except(['_token', 'note']);
        $customerId = $request->get('customer_id');
        //check have been logined or not login
        if ($customerId != null) {
            $checkExistCustomer = $this->customer->find($customerId);
            if ($checkExistCustomer) {
                $orderLogined = [
                    'date_order'=>Carbon::now()->toDateTimeString(),
                    'note' => $request->get('note'),
                    'total' => explode(',',\Cart::subTotal())[0]."000",
                    'customer_id'=>$customerId
                ];
                $orderId = $this->order->save($orderLogined);
                if ($orderId) {
                    foreach (\Cart::content() as $item){
                        $this->orderDetail->save([
                            'order_id' => $orderId,
                            'product_id' => $item->id,
                            'price' => $item->options->price_unsale,
                            'quantity' => $item->qty,
                            'sale' => $item->options->sale
                        ]);
                    }
                    \Cart::destroy();
                    return redirect()->back()->with('success', 'Bạn đã thanh toán thành công');
                }

            } else {
                return redirect()->back()->withErrors('Khách hàng chưa tồn tại');
            }

        } else {
            $customerIds = $this->customer->save($requestCustomer);
            if ($customerIds) {
                $orderLogined = [
                    'date_order'=>Carbon::now()->toDateTimeString(),
                    'note' => $request->get('note'),
                    'total' => explode(',',\Cart::subTotal())[0]."000",
                    'customer_id'=>$customerIds
                ];
                $orderId = $this->order->save($orderLogined);
                if ($orderId) {
                    foreach (\Cart::content() as $item){
                        $this->orderDetail->save([
                            'order_id' => $orderId,
                            'product_id' => $item->id,
                            'price' => $item->options->price_unsale,
                            'quantity' => $item->qty,
                            'sale' => $item->options->sale
                        ]);
                    }
                    \Cart::destroy();
                    return redirect()->back()->with('success', 'Bạn đã thanh toán thành công');
                }
            }

        }


    }

}
