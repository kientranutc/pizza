<section class="banner">
    <div class="row">
        <div id="myCarousel" class="carousel  slide">
            <!-- Dot Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- Items -->
            <div class="carousel-inner">
                <div class="active item">  <img src="{{asset('frontend/assets/img/banner1.jpg')}}" class="img-responsive"></div>
                <div class="item">  <img src="{{asset('frontend/assets/img/banner2.jpg')}}" class="img-responsive"></div>
                <div class="item">  <img src="{{asset('frontend/assets/img/banner3.jpg')}}" class="img-responsive"></div>
                <div class="item">  <img src="{{asset('frontend/assets/img/banner4.png')}}" class="img-responsive"></div>
            </div>
            <!-- Navigation -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
</section>