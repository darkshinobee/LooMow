<!-- Navigation -->
<nav class="navbar navbar-dark bg-inverse navbar-fixed-top">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header col-md-2">
    <button class="navbar-toggler hidden-sm-up pull-sm-right" type="button" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      &#9776;
    </button>
    <a class="navbar-brand" href="/admin_lgx/dashboard">LGX Admin</a>
  </div>
  <div class="col-md-6">
    <form action="{{ url('/admin_lgx/search') }}">
      <div style="margin-top:10px" class="input-group input-group-sm">
        <input type="text" class="form-control" placeholder="Search..." name="keyword"
        aria-describedby="sizing-addon3">
        <span class="input-group-btn">
          <button class="btn btn-primary" type="submit">Go!</button>
        </span>
      </div>
    </form>
  </div>
  <div class="col-md-4">
    <!-- Top Menu Items -->
    <ul class="nav navbar-nav top-nav navbar-right pull-xs-right">
      <li class="dropdown nav-item active">
        <!-- <div class="dropdown"> -->
        <a class="nav-link dropdown-toggle" href="javascript:;" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope"></i> <b class="caret"></b><span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu message-dropdown">
          <li class="dropdown-item message-preview">
            <a href="javascript:;">
              <div class="media">
                <span class="media-left">
                  <img class="media-object" src="http://placehold.it/50x50" alt="">
                </span>
                <div class="media-body">
                  <h5 class="media-heading"><strong>John Smith</strong>
                  </h5>
                  <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                  <p>Lorem ipsum dolor sit amet, consectetur...</p>
                </div>
              </div>
            </a>
          </li>
          <li class="dropdown-item message-preview">
            <a href="javascript:;">
              <div class="media">
                <span class="media-left">
                  <img class="media-object" src="http://placehold.it/50x50" alt="">
                </span>
                <div class="media-body">
                  <h5 class="media-heading"><strong>John Smith</strong>
                  </h5>
                  <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                  <p>Lorem ipsum dolor sit amet, consectetur...</p>
                </div>
              </div>
            </a>
          </li>
          <li class="dropdown-item message-preview">
            <a href="javascript:;">
              <div class="media">
                <span class="media-left">
                  <img class="media-object" src="http://placehold.it/50x50" alt="">
                </span>
                <div class="media-body">
                  <h5 class="media-heading"><strong>John Smith</strong>
                  </h5>
                  <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                  <p>Lorem ipsum dolor sit amet, consectetur...</p>
                </div>
              </div>
            </a>
          </li>
          <li class="dropdown-item message-footer">
            <a href="javascript:;">Read All New Messages</a>
          </li>
        </ul>
        <!-- </div> -->
      </li>
      <li class="dropdown nav-item">
        <!-- <div class="dropdown"> -->
        <a href="javascript:;" class="nav-link dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell"></i> <b class="caret"></b><span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu alert-dropdown">
          <li class="dropdown-item">
            <a href="javascript:;">Alert Name <span class="label label-default"> Alert Badge</span></a>
          </li>
          <li class="dropdown-item">
            <a href="javascript:;">Alert Name <span class="label label-primary"> Alert Badge</span></a>
          </li>
          <li class="dropdown-item">
            <a href="javascript:;">Alert Name <span class="label label-success">Alert Badge</span></a>
          </li>
          <li class="dropdown-item">
            <a href="javascript:;">Alert Name <span class="label label-info"> Alert Badge</span></a>
          </li>
          <li class="dropdown-item">
            <a href="javascript:;">Alert Name <span class="label label-warning"> Alert Badge</span></a>
          </li>
          <li class="dropdown-item">
            <a href="javascript:;">Alert Name <span class="label label-danger"> Alert Badge</span></a>
          </li>
          <li class="dropdown-divider"></li>
          <li class="dropdown-item">
            <a href="javascript:;">View All</a>
          </li>
        </ul>
        <!-- </div> -->
      </li>
      <li class="dropdown nav-item">
        <a href="javascript:;" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ $admin->name }} <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li class="dropdown-item">
            <a href="javascript:;"><i class="fa fa-fw fa-user"></i> Profile</a>
          </li>
          <li class="dropdown-item">
            <a href="javascript:;"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
          </li>
          <li class="dropdown-item">
            <a href="/"><i class="fa fa-fw fa-gear"></i> Front End</a>
          </li>
          <li class="divider"></li>
          <li class="dropdown-item">
            <a href="{{ url('admin_lgx/logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="fa fa-fw fa-power-off"></i> Log Out</a>
            <form id="logout-form" action="{{ url('admin_lgx/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>

        </ul>
      </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  </div>

  <!-- /.navbar-collapse -->
</nav>
