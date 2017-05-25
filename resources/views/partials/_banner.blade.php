    <div id="myCarousel" class="carousel  slide">
      <!-- Dot Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>
      <!-- Items -->
      <div class="carousel-inner">
        <div class="banner1 active item"></div>
        <div class="banner2 item"></div>
        <div class="banner3 item"></div>
        <div class="banner4 item"></div>
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
