<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')-Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('backend/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="{{asset('backend/css/font-awesome.min.css')}}" rel="stylesheet">

	<!-- Pace -->
	<link href="{{asset('backend/css/pace.css')}}" rel="stylesheet">

	<!-- Color box -->
	<link href="{{asset('backend/css/colorbox/colorbox.css')}}" rel="stylesheet">

	<!-- Morris -->
	<link href="{{asset('backend/css/morris.css')}}" rel="stylesheet"/>
	<!-- Datatable -->
    <link href="{{asset('backend/css/jquery.dataTables_themeroller.css')}}" rel="stylesheet">
	<!-- Endless -->
	<link href="{{asset('backend/css/endless.min.css')}}" rel="stylesheet">
	<link href="{{asset('backend/css/endless-skin.css')}}" rel="stylesheet">
	<link href="{{asset('backend/style.css')}}" rel="stylesheet">

		@yield('style')

  </head>

  <body class="overflow-hidden">
	<!-- Overlay Div -->
	<div id="overlay" class="transparent"></div>

	<a href="" id="theme-setting-icon"><i class="fa fa-cog fa-lg"></i></a>
	<div id="theme-setting">
		<div class="title">
			<strong class="no-margin">Skin Color</strong>
		</div>
		<div class="theme-box">
			<a class="theme-color" style="background:#323447" id="default"></a>
			<a class="theme-color" style="background:#efefef" id="skin-1"></a>
			<a class="theme-color" style="background:#a93922" id="skin-2"></a>
			<a class="theme-color" style="background:#3e6b96" id="skin-3"></a>
			<a class="theme-color" style="background:#635247" id="skin-4"></a>
			<a class="theme-color" style="background:#3a3a3a" id="skin-5"></a>
			<a class="theme-color" style="background:#495B6C" id="skin-6"></a>
		</div>
		<div class="title">
			<strong class="no-margin">Sidebar Menu</strong>
		</div>
		<div class="theme-box">
			<label class="label-checkbox">
				<input type="checkbox" checked id="fixedSidebar">
				<span class="custom-checkbox"></span>
				Fixed Sidebar
			</label>
		</div>
	</div><!-- /theme-setting -->

	<div id="wrapper" class="preload">
		<div id="top-nav" class="fixed skin-6">
			<a href="#" class="brand">
				<span>Quản lý hệ thống</span>
				<span class="text-toggle"></span>
			</a><!-- /brand -->
			<button type="button" class="navbar-toggle pull-left" id="sidebarToggle">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<button type="button" class="navbar-toggle pull-left hide-menu" id="menuToggle">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<ul class="nav-notification clearfix">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-envelope fa-lg" data-toggle="tooltip" title="Bình luận" data-toggle="dropdown" data-placement="bottom"></i>
						<span class="notification-label bounceIn animation-delay4">{{$countComment}}</span>
					</a>
				</li>

				<li class="dropdown">
					<a class="dropdown-toggle"  href="{{URL::route('order.index')}}">
						<i class="fa fa-bell fa-lg" data-toggle="tooltip" title="Đơn hàng" data-toggle="dropdown" data-placement="bottom"></i>
						<span class="notification-label bounceIn animation-delay6">{{$countOrder}}</span>
					</a>

				</li>
				<li class="profile dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<strong>{{\Auth::user()->name}}</strong>
						<span><i class="fa fa-chevron-down"></i></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a class="clearfix" href="#">
								<img src="{{(\Auth::user()->image !='')?\Auth::user()->image:asset ('backend/img/user_not_found.jpg')}}" alt="{{(\Auth::user()->image !='')?\Auth::user()->image:asset ('backend/img/user_not_found.jpg')}}">
								<div class="detail">
									<strong>{{\Auth::user()->name}}</strong>
									<p class="grey">{{\Auth::user()->email}}</p>
								</div>
							</a>
						</li>
						<li><a tabindex="-1" href="{{URL::route('user.edit',Auth::user()->id)}}" class="main-link"><i class="fa fa-edit fa-lg"></i> Sửa thông tin</a></li>
						<li class="divider"></li>
						<li><a tabindex="-1" class="main-link logoutConfirm_open" href="#logoutConfirm"><i class="fa fa-lock fa-lg"></i> Đăng xuất</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /top-nav-->
		@include('backend.partials.sidebar')
		<div id="main-container">
			@include('backend.partials.breadcrumb')
			<div class="padding-md">
				@include('backend.partials.message')
				@yield('content')
			</div><!-- /.padding-md -->
		</div><!-- /main-container -->
		<!-- Footer
		================================================== -->
		<!--Modal-->
		<div id="deleteModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-sm">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-body">
						<h4 class="text-center">Bạn có muốn xóa không?</h4>

					</div>
					<div class="modal-footer">
						<a href="" id="btn-modal-delete"class="btn btn-success">Xóa</a>
						<a href="javscript:void(0)" class="btn btn-danger" data-dismiss="modal">Đóng</a>
					</div>
				</div>

			</div>
		</div>
		<div id="imageModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<iframe  width="100%" height="550" frameborder="0" src="{{URL::to('/')}}/filemanager/dialog.php?type=&field_id=image-input">
						</iframe>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>
		</div>
	</div><!-- /wrapper -->

	<a href="" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>

	<!-- Logout confirmation -->
	<div class="custom-popup width-100" id="logoutConfirm">
		<div class="padding-md">
			<h4 class="m-top-none"> Bạn có muốn đăng xuất không?</h4>
		</div>

		<div class="text-center">
			<a class="btn btn-success m-right-sm" href="{{URL::route('admin.logout')}}">Đăng xuất</a>
			<a class="btn btn-danger logoutConfirm_close">Đóng</a>
		</div>
	</div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

	<!-- Jquery -->
	<script src="{{asset('backend/js/jquery-1.10.2.min.js')}}"></script>
	<script src="{{asset('backend/tinymce/js/tinymce/tinymce.min.js')}}"></script>

	<!-- Bootstrap -->
    <script src="{{asset('backend/bootstrap/js/bootstrap.js')}}"></script>

	<!-- Flot -->
	<script src="{{asset('backend/js/jquery.flot.min.js')}}"></script>

	<!-- Morris -->
	<script src="{{asset('backend/js/rapheal.min.js')}}"></script>
	<script src="{{asset('backend/js/morris.min.js')}}"></script>

	<!-- Colorbox -->
	<script src="{{asset('backend/js/jquery.colorbox.min.js')}}"></script>

	<!-- Sparkline -->
	<script src="{{asset('backend/js/jquery.sparkline.min.js')}}"></script>

	<!-- Pace -->
	<script src="{{asset('backend/js/uncompressed/pace.js')}}"></script>

	<!-- Popup Overlay -->
	<script src="{{asset('backend/js/jquery.popupoverlay.min.js')}}"></script>

	<!-- Slimscroll -->
	<script src="{{asset('backend/js/jquery.slimscroll.min.js')}}"></script>
	 <!-- Datatable -->
    <script src="{{asset('backend/js/jquery.dataTables.min.js')}}"></script>
	<!-- Modernizr -->
	<script src="{{asset('backend/js/modernizr.min.js')}}"></script>
	<!-- Cookie -->
	<script src="{{asset('backend/js/jquery.cookie.min.js')}}"></script>
	<script src="{{asset('backend/js/endless/endless.js')}}"></script>
	<script src="{{asset('backend/show_modal_delete.js')}}"></script>
	<script src="{{asset('backend/input_add_image.js')}}"></script>
	@yield('script')
  </body>
</html>
