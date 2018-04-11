@extends('backend.layouts.masterpage')
@section('title')
    Order
@stop
@section('page')
    Order
@stop
@section('breadcrumb')
    Order
@stop
@section('content')
    <div class="row">
        <div class="fix-clean"></div>
    </div>
    <div class="row" id="orderDetailTable">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">

                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" >
                            <thead>
                            <tr class="table-header">
                                <th class="text-center">STT</th>
                                <th class="text-center">Sản phầm</th>
                                <th class="text-center">Giá</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Giảm giá</th>
                                <th class="text-center">Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $total = 0;
                            ?>
                            @forelse($dataOrderDetail as $item)
                                <tr>
                                    <td class="text-center">{{++$stt}}</td>
                                    <td class="text-center">{{$item->product_name}}</td>
                                    <td class="text-center">{{number_format($item->price)}}(đ)</td>
                                    <td class="text-center">{{$item->quantity}}</td>
                                    <td class="text-center">{{($item->sale!=0)?$item->sale."(%)":""}}</td>
                                    <td class="text-center">
                                        @if($item->sale>0)
                                            {{number_format($item->quantity*$item->price*(1-($item->sale/100))).'(đ)'}}
                                        @else
                                            {{number_format($item->quantity*$item->price).'( đ)'}}
                                        @endif
                                    </td>

                                </tr>
                                <?php
                                if($item->sale>0) {
                                    $total+=$item->quantity*$item->price*(1-($item->sale/100));
                                }
                                else {
                                    $total+=$item->quantity*$item->price;
                                }
                                ?>
                            @empty
                            @endforelse
                            <tr>
                                <td colspan="5">Tổng tiền đơn hàng</td>
                                <td class="text-center">{{number_format($total).'(đ)'}}</td>
                            </tr>
                            </tbody>

                        </table>

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>


@stop
