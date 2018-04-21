@extends('frontend.layouts.submasterpage')
@section('title', 'Thanh toán')
@section('link')
    <link rel="stylesheet" href="{{asset('frontend/assets/css/checkout.css')}}">
@stop
@section('content')
<div class="checkout">

    <div class="container wrapper">
        <div class="row cart-head">
            <div class="container">
                <div class="row">
                   <div class="col-md-12">
                       <br/>
                       @if(session()->has('success'))
                           <div class="alert alert-success alert-dismissable">
                               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                               <strong>Success!</strong> {{session()->get('success')}} <a href=""><strong>Mua tiếp</strong></a>
                           </div>
                       @endif
                   </div>
                </div>
                <div class="row">
                    <div style="display: table; margin: auto;">
                        <span class="step step_complete"> <a href="{{URL::route('show-order')}}" class="check-bc">Giỏ hàng</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                        <span class="step step_complete"> <a href="#" class="check-bc">Thanh toán</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
                        <span class="step_thankyou check-bc step_complete">Cảm ơn</span>
                    </div>
                </div>
                <div class="row">
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row cart-body">
            <form class="form-horizontal" method="post" action="{{URL::route('check-out')}}">
                <input type="hidden" name="customer_id" value="{{(session()->has('login-customer'))?session('login-customer')['id']:''}}">
                {{csrf_field()}}
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Thông tin đơn hàng<div class="pull-right"><small><a class="afix-1" href="#"></a></small></div>
                        </div>
                        <div class="panel-body">
                            @forelse($listCart as $item)
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="{!! $item->options->image !!}" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">{{$item->name}}</div>
                                    <div class="col-xs-12"><small>Số lượng:<span>{{$item->qty}}</span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6><span>Giá:</span>{{number_format($item->price)}} đ</h6>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            @empty
                            @endforelse


                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Tổng tiền</strong>
                                    <div class="pull-right"><span></span><span>{{\Cart::subtotal()}}đ</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Thông tin người đặt hàng</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="alert alert-success">
                                       Nếu bạn đã có tài khoản <a href="" id="show-modal-login"><strong>Đăng nhập </strong></a> để thanh toán !
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Họ tên <span class="text-danger">*</span>:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Họ tên" class="form-control" name="fullname" value="{{(session()->has('login-customer'))?session('login-customer')['fullname']:''}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Số điện thoại<span class="text-danger">*</span>:</strong></div>
                                <div class="col-md-12"><input type="text" placeholder="Số điện thoại" name="phone" class="form-control" value="{{(session()->has('login-customer'))?session('login-customer')['phone']:''}}" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Hộp thư<span class="text-danger">*</span>:</strong></div>
                                <div class="col-md-12"><input type="email" placeholder="Hộp thư" name="email" class="form-control" value="{{(session()->has('login-customer'))?session('login-customer')['email']:''}}" /></div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12"><strong>Địa chỉ<span class="text-danger">*</span>:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" placeholder="Địa chỉ" class="form-control" value="{{(session()->has('login-customer'))?session('login-customer')['address']:''}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Ghi chú:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="note" placeholder="Ví dụ: thời gian, số nhà cụ thể khi giao hàng" class="form-control" value="" />
                                </div>
                            </div>


                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                    <!--CREDIT CART PAYMENT-->

                    <!--CREDIT CART PAYMENT END-->
                </div>
                <div class="row cart-footer text-center">
                    <button type="submit" class="btn btn-success"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Thanh toán</button>
                </div>
                <br>
            </form>
        </div>

    </div>
</div>
@stop
@section('script')
    <script src="{{asset('frontend/assets/js/checkout.js')}}"></script>
    @stop
