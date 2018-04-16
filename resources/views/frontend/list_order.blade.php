@extends('frontend.layouts.submasterpage')
@section('title', 'Giỏ hàng')
@section('link')
    <link rel="stylesheet" href="{{asset('frontend/assets/css/list_order.css')}}">
@stop
@section('content')
<div class="block_list_cart">
    <div class="block__header">
        <h2 class="block__title">Giỏ hàng</h2>
    </div>
    <div class="reload-order">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center" width="5%">STT</th>
                    <th class="text-center" width="15%">Sản phẩm</th>
                    <th class="text-center" width="15%">Ảnh</th>
                    <th class="text-center" width="10%">Số lượng</th>
                    <th class="text-center" width="15%">Giá</th>
                    <th class="text-center" width="10%">Giảm giá</th>
                    <th class="text-center" width="15%">Thành tiền</th>
                    <th class="text-center" width="20%"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($dataOrder as  $item)
                <tr>
                    <td class="text-center">{{++$stt}}</td>
                    <td class="text-center">{{$item->name}}</td>
                    <td class="text-center"><img src="{{$item->options->image}}" width="50%" height="50%" alt=""></td>
                    <td class="text-center"><input type="number" class="qty-update" min="1" data-cart="{{$item->rowId}}" value="{{$item->qty}}" ></td>
                    <td class="text-center">{{number_format($item->options->price_unsale)}} đ</td>
                    <td class="text-center">{{($item->options->sale>0)?$item->options->sale.'(%)':''}}</td>
                    <td class="text-center">{{number_format($item->price*$item->qty)}} đ</td>
                    <td class="text-center">
                        <a href="" class="text-danger delete-cart" data-id="{{$item->rowId}}" data-toggle="tooltip" title="Xóa "><i class="far fa-trash-alt fa-lg"></i></a>
                    </td>
                </tr>

                @empty
                @endforelse
                <tr>
                    <td colspan="7">Tổng tiền</td>
                    <td class="text-center">{{\Cart::subtotal()}}</td>
                </tr>
                </tbody>
            </table>
            <div class="btn-checkout text-right">
                <a href="{{URL::route('check-out')}}" class="btn btn-success">Thanh toán</a>
            </div>
        </div>
    </div>
</div>
@stop