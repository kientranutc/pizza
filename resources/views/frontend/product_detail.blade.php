@extends('frontend.layouts.submasterpage')
@section('title',$productDetail->name)
@section('link')
    <link rel="stylesheet" href="{{asset('frontend/assets/css/product_detail.css')}}">
@stop
@section('content')
    <div class="product-detail">
        <div class="title-category">
            <h2>{{$productDetail->name}}</h2>
        </div>
        <div class="top-detail">
            <div class="row">
                <div class="col-md-6 img-product-detail">
                    <img src="{{$productDetail->image}}" alt="{{$productDetail->image}}">
                </div>
                <div class="col-md-6 sapo-product">
                    <h3 class="color-product">Sản phẩm: <strong>{!! $productDetail->name !!}</strong></h3>
                    <div class="rating">
                        <span class="title-rate-star"><strong>Đánh giá:</strong></span>
                        <input type="radio" id="star5" name="rating"/><label   data-rate="5_{{$productDetail->id}}" class = "full rate-star-val" for="star5" title="5 stars"></label>
                        <input type="radio" id="star4" name="rating"   /><label  data-rate="4_{{$productDetail->id}}" class = "full rate-star-val" for="star4" title="4 stars"></label>
                        <input type="radio" id="star3" name="rating"  /><label  data-rate="3_{{$productDetail->id}}" class = "full rate-star-val" for="star3" title="3 stars"></label>
                        <input type="radio" id="star2" name="rating"  /><label  data-rate="2_{{$productDetail->id}}" class = "full rate-star-val" for="star2" title="2 stars"></label>
                        <input type="radio" id="star1" name="rating"  /><label   data-rate="1_{{$productDetail->id}}" class = "full rate-star-val" for="star1" title="1 star"></label>
                    </div>
                    @if($productDetail->sale>0)
                        <p class="text-danger"><strong>Giảm: {{$productDetail->sale}}(%)</strong></p>
                        <p class="color-product"><strong>Còn lại: {!! number_format($productDetail->price*(1-$productDetail->sale/100)) !!} đ</strong></p>
                    @else
                        <p class="color-product"><strong>Giá: {!! number_format($productDetail->price) !!} đ</strong></p>
                    @endif
                    <div class="action-add-cart">
                        <h3><a href="" data-product="{{$productDetail->id}}" class="add-cart-detail">Mua ngay</a></h3>
                    </div>

                </div>

            </div>
        </div>
        <div class="product-description">
            <div class="product-description-title">
                <h4>Chi tiết sản phẩm</h4>
            </div>
            <div class="contente-product-detail">
                {!! $productDetail->description !!}
            </div>
        </div>

    </div>
    @stop