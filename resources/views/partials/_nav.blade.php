<div class="header">
  <div class="container">
    <div class="head">
      <div class="logo">
        <a href="#"><img src="/images/game_logo.jpg" alt=""></a>
      </div>
    </div>
  </div>
  <div class="header-top">
    <div class="container">
      <div class="col-sm-5 col-md-offset-2  header-login">
        <ul>
          @if (Auth::guard('customer')->check())
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
            href="">Hello {{ Auth::guard('customer')->user()->first_name .' '. Auth::guard('customer')->user()->last_name }} <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/account">My Account</a></li>
            <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>
        @else
        <li><a href="/login">Log In</a></li>
        <li><a href="/register">Register</a></li>
        @endif

        <li><a href="/checkout">Checkout</a></li>
      </ul>
    </div>

    <div class="col-sm-5 header-social">
      <ul >
        <li><a href="#"><i></i></a></li>
        <li><a href="#"><i class="ic1"></i></a></li>
        <li><a href="#"><i class="ic2"></i></a></li>
        <li><a href="#"><i class="ic3"></i></a></li>
        <li><a href="#"><i class="ic4"></i></a></li>
      </ul>

    </div>
    <div class="clearfix"> </div>
  </div>
</div>

<div class="container">

  <div class="head-top">

    <div class="col-sm-8 col-md-offset-2 h_menu4">
      <nav class="navbar nav_bottom" role="navigation">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header nav_2">
          <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
          <ul class="nav navbar-nav nav_1">
            <li><a class="color" href="/">Home</a></li>
            <li class="active"><a class="color1" href="#">Games</a></li>
            <li><a class="color4" href="/about">About</a></li>
            <li ><a class="color6" href="/contact">Contact</a></li>
          </ul><br>
          <div class="input-group">
            <input type="text" class="form-control nb" placeholder="Search...">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="button">
                <i class="glyphicon glyphicon-search"> </i>
              </button>
            </span>
          </div>
        </div><!-- /.navbar-collapse -->

      </nav>
    </div>

    <div class="col-sm-2 search-right">
      <div class="cart box_1">
        <a href="/viewBuy">
          <h3> <div class="total">
            <span class="badge"> {{ Cart::instance('buyCart')->count() }} </span>
            <img src="/images/theme/cart.png" alt=""/>
            <span class="label label-primary">Buy Cart</span>
          </h3>
        </a>
      </div>

      <div class="clearfix"> </div>
      <div class="cart box_1">
        <a href="/viewSell">
          <h3> <div class="total">
            <span class="badge"> {{ Cart::instance('sellCart')->count() }} </span>
            <img src="/images/theme/cart.png" alt=""/>
            <span class="label label-danger">Sell Cart</span>
          </h3>
        </a>
      </div>
    </div>
  </div>
</div>
</div>
