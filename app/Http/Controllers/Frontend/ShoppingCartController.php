<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Bank;
use App\Models\BankPosition;
use App\Models\OrderBank;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Repositories\ShoppingCart\ShoppingCartRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            $dataOrder = $this->cart->showCart();
            $stt = 0;
            return view('frontend.list_order', compact('stt','dataOrder'));

    }

    public function checkout()
    {
        $listCart = $this->cart->showCart();
        $bankPosition  = BankPosition::all();
        return view('frontend.checkout', compact('listCart', 'bankPosition'));
    }

    public function processCheckOut(Request $request)
    {
        $requestCustomer =$request->except(['_token', 'note']);
        $bankPosition = $request->get('bank_position');
        $seri =  $request->get('seri');
        $pin = $request->get('pin');
        $checkExitsSeri = Bank::where('seri', $seri)->count();
        $checkExitsSeriLogin = Bank::where('seri', $seri)
                                ->where('pin', trim($pin,''))->first();

        if ($checkExitsSeri==0){
            return redirect()->back()->withErrors('Số tài khoản chưa tồn tại');
        }
        if (empty($checkExitsSeriLogin)){
            return redirect()->back()->withErrors('Số thẻ hoặc mã pin sai');
        }
        $total = intval(\Cart::subTotal())."000";
        if((intval(intval($checkExitsSeriLogin->money))-50000) - intval($total)<0){
            return redirect()->back()->withErrors('Số tiền trong tài khoản không đủ để thanh toán');
        }
        $customerId = $request->get('customer_id');
        $dataOrder = $this->cart->showCart();
        $email =$request->get('email');
        $stt=0;
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
                $bankOrder = new  OrderBank();
                $bankOrder->order_id =$orderId;
                $bankOrder->bank_seri = $seri;
                $bankOrder->total = intval(explode(',',\Cart::subTotal())[0]."000");
                $bankOrder->content = "Thanh toán tiền mua hàng";
                $bankOrder->bank_position =$bankPosition;
                $bankOrder->save();
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
                    Mail::send('email.order',
                        compact('stt','dataOrder'), function($m) use ($email)
                        {
                            $m->to($email)->subject('Đơn hàng tại cửa hàng pizza');
                        });
                    \Cart::destroy();
                    return view('frontend.thank_order')->with('success', 'Bạn đã thanh toán thành công');

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
                $bankOrder = new  OrderBank();
                $bankOrder->order_id =$orderId;
                $bankOrder->bank_seri = $seri;
                $bankOrder->total = intval(explode(',',\Cart::subTotal())[0]."000");
                $bankOrder->content = "Thanh toán tiền mua hàng";
                $bankOrder->bank_position =$bankPosition;
                $bankOrder->save();
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
                    Mail::send('email.order',
                        compact('stt','dataOrder'), function($m) use ($email)
                        {
                            $m->to($email)->subject('Đơn hàng tại cửa hàng pizza');
                        });
                    \Cart::destroy();
                    return view('frontend.thank_order')->with('success', 'Bạn đã thanh toán thành công');


                }
            }

        }


    }

}
