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
      <div class="row">
        <div class="header-social">
          <div class="col-sm-4">
          <ul>
            <li><a href="#"><i></i></a></li>
            <li><a href="#"><i class="ic1"></i></a></li>
            <li><a href="#"><i class="ic2"></i></a></li>
            <li><a href="#"><i class="ic3"></i></a></li>
            <li><a href="#"><i class="ic4"></i></a></li>
          </ul>
</div>
        </div>
        <div class="col-sm-6">
<search></search>
        </div>
      <div class="header-login">
        <div class="col-sm-2">
        <ul>
          @if (Auth::guard('customer')->check())
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
              href="">Hello {{ Auth::guard('customer')->user()->first_name .' '. Auth::guard('customer')->user()->last_name }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="/account">My Account</a></li>
              <li><a href="/orders">My Orders</a></li>
              <li><a href="/my_uploads">My Games</a></li>
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
      </ul>
    </div>
</div>
    <div class="clearfix"> </div>
    </div>
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
            <li class="dropdown"><a class="color1 dropdown-toggle" href="#"
              id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Games
              <span class="caret"></span></a>
              <ul class="dropdown-menu sortHov" aria-labelledby="dropdownMenu1">
                <li><a href="{{ route('sorted', ['platform' => "PS4"]) }}">PS4</a></li>
                <li><a href="{{ route('sorted', ['platform' => "PS3"]) }}">PS3</a></li>
                <li><a href="{{ route('sorted', ['platform' => "XboxOne"]) }}">XBOX One</a></li>
                <li><a href="{{ route('sorted', ['platform' => "Xbox360"]) }}">XBOX 360</a></li>
                <li><a href="{{ route('sorted', ['platform' => "PSVita"]) }}">PS Vita</a></li>
                <li><a href="{{ route('sorted', ['platform' => "NintendoWii"]) }}">Nintendo Wii</a></li>
              </ul>
            </li>
            <li><a class="color4" href="/about">About</a></li>
            <li ><a class="color6" href="/contact">Contact</a></li>
          </ul><br>
             <form class="" action="/game_upload" method="get">
               <button class="btn col-md-5 sellBtn btnColor a_link">Sell a Game</button>
             </form>
        </div><!-- /.navbar-collapse -->

      </nav>
    </div>

    <div class="col-sm-2 search-right cartBuy">
      <div class="cart box_1">
        <a href="/viewBuy">
          <h3> <div class="total">
            <span class="badge"> {{ Cart::instance('buyCart')->count() }} </span>
            <img src="/images/theme/cart.png" alt=""/>
            <button class="btn btn-md btnColor a_link">Game Cart</button>
          </h3>
        </a>
      </div>
  </div>
</div>
</div>
