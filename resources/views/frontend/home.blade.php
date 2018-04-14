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
                            <p><strong class="text-danger">{!!($item->sale>0)?"Giảm giá:".$item->sale."(%)":'<br/>'!!}</strong></p>
                            <div class="rating">
                                <input type="radio" id="star5" name="rating"/><label   data-rate="5_{{$item->id}}" class = "full rate-star-val" for="star5" title="5 stars"></label>
                                <input type="radio" id="star4" name="rating"   /><label  data-rate="4_{{$item->id}}" class = "full rate-star-val" for="star4" title="4 stars"></label>
                                <input type="radio" id="star3" name="rating"  /><label  data-rate="3_{{$item->id}}" class = "full rate-star-val" for="star3" title="3 stars"></label>
                                <input type="radio" id="star2" name="rating"  /><label  data-rate="2_{{$item->id}}" class = "full rate-star-val" for="star2" title="2 stars"></label>
                                <input type="radio" id="star1" name="rating"  /><label   data-rate="1_{{$item->id}}" class = "full rate-star-val" for="star1" title="1 star"></label>
                            </div>
                           <p> <a href="{{URL::route('product', $item->slug)}}" class="btn btn-success btn-sm">xem chi tiết</a></p>
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