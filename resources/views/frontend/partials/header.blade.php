<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div id="logo">
                    <a href="{{url('/')}}"><img src="{{asset('frontend/assets/img/logo.jpg')}}" alt=""></a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="menu-top">
                            <div class="account">
                                @if (session()->has('login-customer'))
                                    <div class="dropdown">
                                        <a class="dropdown-toggle active-login" type="button" data-toggle="dropdown">xin chào,{{session('login-customer')['username']}}<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="" class="show-login-customer">Tài khoản của bạn</a></li>
                                            <li><a href="{{URL::route('logout-account')}}" class="show-login-customer">Đăng xuất({{session('login-customer')['username']}})</a></li>
                                        </ul>
                                    </div>

                                @else
                                <a href="{{URL::route('register')}}">Tạo tài khoản</a>
                                <a href="{{URL::route('login-account')}}">Đăng nhập</a>
                                 @endif
                            </div>
                            <div class="cart">
                                <a href="{{URL::route('show-order')}}"><span class="glyphicon glyphicon-shopping-cart"></span> <span class="count-order">{{\Cart::count()}}</span>Giỏ hàng</a>
                            </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="menu-content">
                            <nav class="navbar navbar-default">
                                <div class="container-fluid">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>

                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav" id="menu-right">

                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Thực đơn<span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                   @forelse($category as $item)
                                                    <li><a href="{{URL::route('category',$item->slug)}}">{{$item->name}}</a></li>
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            </li>
                                            <li><a href="{{URL::route('service',['type'=>1])}}">Khuyến mại</a></li>
                                            <li><a href="{{URL::route('service',['type'=>2])}}">Blog</a></li>
                                            <li><a href="{{URL::route('introduce')}}">Giới thiệu</a></li>
                                            @if (session()->has('login-customer'))
                                                <div class="dropdown" id="hidden-mobile-menu">
                                                    <a class="dropdown-toggle active-login" type="button" data-toggle="dropdown">xin chào,{{session('login-customer')['username']}}<span class="caret"></span></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="" class="show-login-customer">Tài khoản của bạn</a></li>
                                                        <li><a href="{{URL::route('logout-account')}}" class="show-login-customer">Đăng xuất({{session('login-customer')['username']}})</a></li>
                                                    </ul>
                                                </div>

                                            @else
                                            <li class="menu-hide-destop"><a href="{{URL::route('register')}}"><span class="glyphicon glyphicon-plus-sign"></span> Tạo tài khoản</a></li>
                                            <li class="menu-hide-destop"><a href="{{URL::route('login-account')}}"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
                                            @endif
                                                <li class="menu-hide-destop" id="cart-mobile-hide">
                                                <a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> <span class="count-order">{{\Cart::count()}}</span>Giỏ hàng</a>
                                            </li>
                                        </ul>

                                    </div><!-- /.navbar-collapse -->
                                </div><!-- /.container-fluid -->
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>