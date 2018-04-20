<aside class="fixed skin-6">
			<div class="sidebar-inner scrollable-sidebar">
				<div class="size-toggle">
					<a class="btn btn-sm" id="sizeToggle">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="btn btn-sm pull-right logoutConfirm_open"  href="#logoutConfirm">
						<i class="fa fa-power-off"></i>
					</a>
				</div><!-- /size-toggle -->
				<div class="user-block clearfix">
					<img src="{{(\Auth::user()->image !='')?\Auth::user()->image:asset ('backend/img/user_not_found.jpg')}}" alt="User Avatar">
					<div class="detail">
						<strong>{{\Auth::user()->name}}</strong><span class="badge badge-danger m-left-xs bounceIn animation-delay4"></span>

					</div>
				</div><!-- /user-block -->

				<div class="main-menu">
					<ul>
						<li class="{{(Route::currentRouteName()=='admin.dashboard')?'active':''}}">
							<a href="{{URL::route('admin.dashboard')}}">
								<span class="menu-icon">
									<i class="fa fa-desktop fa-lg"></i>
								</span>
								<span class="text">
									Quản lý chung
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li class="{{(Route::currentRouteName()=='category.index')?'active':''
                    		|| (Route::currentRouteName()=='category.create')?'active':''
                    		|| (Route::currentRouteName()=='category.edit')?'active':''
       						}}">
							<a href="{{URL::route('category.index')}}">
								<span class="menu-icon">
									<i class="fa fa-desktop fa-lg"></i>
								</span>
								<span class="text">
									Danh mục
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li class="{{(Route::currentRouteName()=='product.index')?'active':''
								|| (Route::currentRouteName()=='product.create')?'active':''
       						}}">
							<a href="{{URL::route('product.index')}}">
								<span class="menu-icon">
									<i class="fa fa-desktop fa-lg"></i>
								</span>
								<span class="text">
									Sản phẩm
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li class="openable open">
							<a href="#">
								<span class="menu-icon">
									<i class="fa fa-file-text fa-lg"></i>
								</span>
								<span class="text">
									Quản lý người dùng
								</span>
								<span class="menu-hover"></span>
							</a>
							<ul class="submenu">
								<li><a href="{{URL::route('user.index')}}"><span class="submenu-label"></span>Quản lý user </a></li>
								<li><a href="register.html"><span class="submenu-label">Quản lý quyền</span></a></li>
							</ul>
						</li>

						<li class="{{(Route::currentRouteName()=='news.index')?'active':''
								|| (Route::currentRouteName()=='news.create')?'active':''
								|| (Route::currentRouteName()=='news.edit')?'active':''
       						}}">
							<a href="{{URL::route('news.index')}}">
								<span class="menu-icon">
									<i class="fa fa-desktop fa-lg"></i>
								</span>
								<span class="text">
									Dịch vụ
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li class="{{(Route::currentRouteName()=='order.index')?'active':''
								|| (Route::currentRouteName()=='order.change-status')?'active':''
       						}}">
							<a href="{{URL::route('order.index')}}">
								<span class="menu-icon">
									<i class="fa fa-desktop fa-lg"></i>
								</span>
								<span class="text">
									Quản lý đơn hàng
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li class="{{(Route::currentRouteName()=='banner.index')?'active':''
								|| (Route::currentRouteName()=='banner.create')?'active':''
								|| (Route::currentRouteName()=='banner.edit')?'active':''
       						}}">
							<a href="{{URL::route('banner.index')}}">
								<span class="menu-icon">
									<i class="fa fa-desktop fa-lg"></i>
								</span>
								<span class="text">
									Quản lý banner
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li class="{{(Route::currentRouteName()=='customer.index')?'active':''}}">
							<a href="{{URL::route('customer.index')}}">
								<span class="menu-icon">
									<i class="fa fa-desktop fa-lg"></i>
								</span>
								<span class="text">
									Tài khoản khách hàng
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li class="openable open {{(Route::currentRouteName()=='product-wish.index')
												|| (Route::currentRouteName()=='product-no-order.index')
												?'active':''}}
								">
							<a href="#">
								<span class="menu-icon">
									<i class="fa fa-file-text fa-lg"></i>
								</span>
								<span class="text">
									Báo cáo,thống kê
								</span>
								<span class="menu-hover"></span>
							</a>
							<ul class="submenu">
								<li class ="{{(Route::currentRouteName()=='product-wish.index')
												?'active':''}}"><a href="{{URL::route('product-wish.index')}}"><span class="submenu-label"></span>Sản phẩm đánh giá </a></li>
								<li {{(Route::currentRouteName()=='product-no-order.index')
												?'active':''}}><a href="{{URL::route('product-no-order.index')}}"><span class="submenu-label"></span>Sản phẩm tồn kho </a></li>
								<li {{(Route::currentRouteName()=='summary-order.index')
												?'active':''}}><a href="{{URL::route('summary-order.index')}}"><span class="submenu-label"></span>Doanh thu</a></li>
							</ul>
						</li>

					</ul>
				</div><!-- /main-menu -->
			</div><!-- /sidebar-inner -->
		</aside>