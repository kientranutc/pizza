@extends('frontend.layouts.masterpage')
@section('title', 'Trang chủ')

@section('content')

    <div class="love-product">
        <div class="title-category">
            <h2>Món ăn được yêu thích</h2>
        </div>
        <div class="content-product">
            <div class="row">
                @forelse($productWish as $item)
                <div class="col-md-3 item-product">
                    <img src="{{$item->image}}" alt="">
                    <div class="detail-product">
                        <h4>{{$item->name}}</h4>
                        <div  class="price"><strong class="price__text">{{number_format($item->price)}}&nbsp;₫</strong></div>
                    </div>
                    <div class="action-add-cart">
                        <h3><a href="" data-product="{{$item->id}}" class="add-cart">Mua ngay</a></h3>
                    </div>
                    <div class="overlay">
                        <h4>{{$item->name}}</h4>
                        <div class="tooltip-detail">
                            {!! $item->description !!}
                            <a href="">xem chi tiết</a>
                        </div>
                    </div>
                </div>
                @empty
                    <p class="text-center">Dữ liệu trống</p>
                @endforelse

            </div>
        </div>
        <div class="load-more">
            <a href="">Xem tất cả sản phẩm</a>
        </div>
    </div>
    <div class="sale-product">
        <div class="title-category">
            <h2>CHƯƠNG TRÌNH KHUYẾN MÃI</h2>
        </div>
        <div class="sale-deltail">
            <div class="carousel-product">

                <div class="carousel-product__item carousel-product__item--huge  ">
                    <a href="javascript:;" title="{{$saleService[0]['title']}}">
                        <img src="{{$saleService[0]['image']}}" alt="{{$saleService[0]['image']}}" class="carousel-product__img">
                    </a>
                </div>
                <div class="carousel-product__item  carousel-product__item--small  ">
                    <a href="javascript:;" title="{{$saleService[1]['title']}}">
                        <img src="{{$saleService[1]['image']}}" alt="{{$saleService[1]['image']}}" class="carousel-product__img">
                    </a>
                </div>
                <div class="carousel-product__item  carousel-product__item--small  ">
                    <a href="javascript:;" title="{{$saleService[2]['title']}}">
                        <img src="{{$saleService[2]['image']}}" alt="{{$saleService[2]['image']}}" class="carousel-product__img">
                    </a>
                </div>
                <div class="carousel-product__item  carousel-product__item--medium  ">
                    <a href="javascript:;" title="{{$saleService[3]['title']}}"><img src="{{$saleService[3]['image']}}" alt="{{$saleService[3]['image']}}" class="carousel-product__img">

                    </a>
                </div>

            </div>
        </div>
    </div>
@stop