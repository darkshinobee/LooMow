{{-- <div class="banner-top">

</div> --}}
    <div id="myCarousel" class="carousel  slide">
      <!-- Dot Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <!-- Items -->
      <div class="carousel-inner">
        {{-- <div class="active item">  <img src="/images/banner/wd2_banner.png" class="img-responsive"></div>
        <div class="item">  <img src="/images/banner/hzd.jpg" class="img-responsive"></div>
        <div class="item">  <img src="/images/banner/mea.png" class="img-responsive"></div> --}}
        <div class="banner-top1 active item">

        </div>
        <div class="banner-top2 item">

        </div>
        <div class="banner-top3 item">

        </div>
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

<script type="text/javascript">
$(document).ready(function() {
  $('.carousel').carousel({interval: 2000});
});
</script>
