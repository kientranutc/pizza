@extends('backend.layouts.masterpage')
@section('title', 'quản lý chung')
@section('breadcrumb')
quản lý chung
@stop
@section('content')

<div class="main-header clearfix">
				<div class="page-title">
					<h3 class="no-margin">Quản lý chung</h3>
					<span>Chào bạn:{{\Auth::user()->name}}</span>
				</div><!-- /page-title -->

				<ul class="page-stats">
			    	<li>
			    		<div class="value">
			    			<span>Doanh thu đến hiện tại</span>
			    			<h4><strong >{{number_format($moneyOrder)}} đ</strong></h4>
			    		</div>
			    		<span id="balances" class="sparkline"></span>
			    	</li>
			    </ul><!-- /page-stats -->
			</div><!-- /main-header -->

			<div class="grey-container shortcut-wrapper">
				<h2 class="text-center">Quản lý hệ thống website bán pizza</h2>
				<img src="{{asset('frontend/assets/img/banner1.jpg')}}" alt="">
			</div><!-- /grey-container -->
@endsection