<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('backend/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="{{asset('backend/css/font-awesome.min.css')}}" rel="stylesheet">

	<!-- Endless -->
	<link href="{{asset('backend/css/endless.min.css')}}" rel="stylesheet">

  </head>

  <body>
	<div class="login-wrapper">
		<div class="text-center">
			<h2 class="fadeInUp animation-delay8" style="font-weight:bold">
				<span class="text-success">Endless</span> <span style="color:#ccc; text-shadow:0 1px #fff">Admin</span>
			</h2>
		</div>
		<div class="login-widget animation-delay1">
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					<div class="pull-left">
						<i class="fa fa-lock fa-lg"></i> Đăng nhập
					</div>


				</div>
				<div class="panel-body">
					<form class="form-login" action="{{URL::route('admin.sign-in')}}" method="post">
						{{csrf_field()}}
						<p class="text-center text-danger"><strong>@if($errors->any())
									{{$errors->first()}}@endif</strong></p>
						<div class="form-group {{($errors->has('email'))?'has-error':''}}">
							<label>Email</label>
							<input type="text" name="email" value="{{old('email')}}"placeholder="Email" class="form-control input-sm bounceIn animation-delay2" >
						</div>
						<div class="form-group {{($errors->has('password'))?'has-error':''}}">
							<label>Mật khẩu</label>
							<input type="password" placeholder="Mật khẩu" name="password" class="form-control input-sm bounceIn animation-delay4">
						</div>
						<div class="form-group">
							<label class="label-checkbox inline">
								<input type="checkbox" class="regular-checkbox chk-delete" />
								<span class="custom-checkbox info bounceIn animation-delay4"></span>
							</label>
							Remember me
						</div>

						<div class="seperator"></div>
						<div class="form-group">
							Forgot your password?<br/>
							Click <a href="#">here</a> to reset your password
						</div>

						<hr/>
						<button type="submit" class="btn btn-success btn-sm bounceIn animation-delay5 pull-right">Đăng nhập</button>
					</form>
				</div>
			</div><!-- /panel -->
		</div><!-- /login-widget -->
	</div><!-- /login-wrapper -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- Jquery -->
	<script src="{{asset('backend/js/jquery-1.10.2.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{asset('backend/bootstrap/js/bootstrap.min.js')}}"></script>

	<!-- Modernizr -->
	<script src="{{asset('backend/js/modernizr.min.js')}}"></script>

    <!-- Pace -->
	<script src="{{asset('backend/js/pace.min.js')}}"></script>

	<!-- Popup Overlay -->
	<script src="{{asset('backend/js/jquery.popupoverlay.min.js')}}"></script>

    <!-- Slimscroll -->
	<script src="{{asset('backend/js/jquery.slimscroll.min.js')}}"></script>

	<!-- Cookie -->
	<script src="{{asset('backend/js/jquery.cookie.min.js')}}"></script>

	<!-- Endless -->
	<script src="{{asset('backend/js/endless/endless.js')}}"></script>
  </body>
</html>
