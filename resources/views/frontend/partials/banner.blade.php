<section class="banner">
    <div class="row">
        <div id="myCarousel" class="carousel  slide">
            <!-- Dot Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                @for($i=1;$i<count($banner);$i++)
                <li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
                @endfor
            </ol>
            <!-- Items -->
            <div class="carousel-inner">
                <div class="active item">  <img src="{{current($banner)['image']}}" class="img-responsive"></div>
                @forelse( $banner as $item)
                <div class="item">  <img src="{{$item['image']}}" class="img-responsive"></div>

                    @empty
                @endforelse
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