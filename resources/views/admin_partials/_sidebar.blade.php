<div class="collapse navbar-collapse navbar-toggleable-sm navbar-ex1-collapse">
  <ul class="nav navbar-nav side-nav list-group">
    <li class="list-group-item">
      <a href="/admin_lgx/dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
    </li>
    <li class="list-group-item">
      <a href="#"><i class="fa fa-fw fa-user"></i> Customers</a>
    </li>

    <li class="list-group-item">
      <a href="javascript:;" data-toggle="collapse" data-target="#demo_pr">
        <i class="fa fa-fw fa-gamepad"></i> Products <i class="fa fa-fw fa-caret-down"></i></a>
      <ul id="demo_pr" class="list-group collapse">
        <li class="list-group-item">
          <a href="{{ url('admin_lgx/addProduct') }}">Add Product</a>
        </li>
      </ul>
    </li>

    <li class="list-group-item">
      <a href="javascript:;" data-toggle="collapse" data-target="#demo_tr">
        <i class="fa fa-fw fa-money"></i> Transactions <i class="fa fa-fw fa-caret-down"></i></a>
      <ul id="demo_tr" class="list-group collapse">
        <li class="list-group-item">
          <a href="{{ url('admin_lgx/disapproved_games') }}"> Disapproved Games</a>
        </li>
        <li class="list-group-item">
          <a href="{{ url('admin_lgx/temp_uploads') }}">Temp Uploads</a>
        </li>
        <li class="list-group-item">
          <a href="{{ url('admin_lgx/games_awaiting_purchase') }}">Games Awaiting Purchase</a>
        </li>
        <li class="list-group-item">
          <a href="{{ url('admin_lgx/games_sold') }}">Successful Sales</a>
        </li>
      </ul>
    </li>

  </ul>
</div>
