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
                                <th class="text-center">Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--<?php $i=1;--}}
                            {{--$totalOrder;--}}
                            {{--?>--}}
                            {{--@foreach($orderDetail as $item)--}}
                                {{--<tr>--}}
                                    {{--<td class="text-center">{{$i}}</td>--}}
                                    {{--<td class="text-center">{{$item->name}}</td>--}}
                                    {{--<td class="text-center">{{number_format($item->price)}}(đ)</td>--}}
                                    {{--<td class="text-center">{{$item->quanlity}}</td>--}}
                                    {{--<td class="text-center">{{number_format($item->total)}}</td>--}}
                                    {{--<?php $i++;--}}
                                    {{--$totalOrder= $item->total_order;--}}
                                    {{--?>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td colspan="4">Tổng tiền đơn hàng</td>--}}
                                    {{--<td class="text-center">{{number_format($totalOrder)}}(đ)</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}

                            </tbody>

                        </table>

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>


@stop
