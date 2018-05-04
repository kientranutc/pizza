@extends('frontend.layouts.submasterpage')
@section('title', (($type==1)?"Tin Khuyến mại":"Blog"))
@section('link')
    <link rel="stylesheet" href="{{asset('frontend/assets/css/product_detail.css')}}">
@stop
@section('content')
    <div class="product-detail">
        <h2>{{$dataServiceDetail->title}}</h2>
        <p><i class="fa fa-calendar" aria-hidden="true"></i> {{$dataServiceDetail->created_at}}| <i class="fa fa-user" aria-hidden="true"></i> {{$dataServiceDetail->user_create}}
        </p>
        <div style="margin-top: 20px;">
            {!!$dataServiceDetail->description!!}
        </div>

    </div>
@stop