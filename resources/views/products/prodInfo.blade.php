@extends('master')
@section('title', 'Product Page Test')

@section('content')

<div class="row">
  <div class="col-md-6">
    <div class="row">
      <div class="col-sm-12">
        <div class="panel-heading cenText">Video Games | PS4 Games</div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="panel-body"><img src="/images/cod2016.jpg" class="img-responsive" style="width:100%" alt="Image">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <p class="lead cenText">COD: Infinite Warfare</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <h2 class="cenText lead">Product Details</h2>
    <div class="row">
      <div class="col-sm-6">
        <dl>
          <dt>Genre:</dt>
          <dd>Warfare</dd>
        </dl>
        <dl>
          <dt>Developer:</dt>
          <dd>AcTiVision</dd>
        </dl>
        <dl>
          <dt>Release Date:</dt>
          <dd>November 4, 2016</dd>
        </dl>
      </div>
      <div class="col-sm-6">
        <dl>
          <dt>We Sell For:</dt>
          <dd>N00,000</dd>
        </dl>
        <dl>
          <dt>We Buy For Cash:</dt>
          <dd>N00,000</dd>
        </dl>
        <dl>
          <dt>We Buy For Voucher:</dt>
          <dd>N00,000</dd>
        </dl>
      </div>
    </div>
    <div class="row"><br>
      <div class="col-sm-6">
        <a class="btn btn-primary btn-block btn-lg" href="#">Buy Item</a>
      </div>
      <div class="col-sm-6">
        <a class="btn btn-danger btn-block btn-lg" href="#">Sell Item</a>
      </div>
    </div><br>
    <div class="row">
      <div class="col-sm-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#prodReview" aria-controls="prodReview" role="tab" data-toggle="tab">Product Review</a></li>
          <li role="presentation"><a href="#writeReview" aria-controls="writeReview" role="tab" data-toggle="tab">Write A Review</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="prodReview">
            <h3>COD: Infinite Warfare</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div role="tabpanel" class="tab-pane" id="writeReview">
              <h3>I need to put a review form here</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @endsection