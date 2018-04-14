@extends('frontend.layouts.submasterpage')
@section('title', 'dịch vụ')
@section('link')
    <link rel="stylesheet" href="{{asset('frontend/assets/css/service.css')}}">
    @stop
@section('content')
    <div class="title-category">
        <h2>
            @if(Request::get('type')==1)
                Khuyến mại
                @else
                Blog Hướng dẫn làm bánh
            @endif
        </h2>
    </div>
        <div class="index-content">
            <div class="container">
                @forelse($dataService as $item)
                <a href="blog-ici.html">
                    <div class="col-lg-4">
                        <div class="card">
                            <img src="{{$item->image}}">
                            <h4>{{$item->title}}</h4>
                            <p>{!! str_limit($item->description,100,' ') !!}</p>
                            <a href="blog-ici.html" class="blue-button">Xem thêm</a>
                        </div>
                    </div>
                </a>
              @empty
                @endforelse

            </div>
        </div>

@stop
