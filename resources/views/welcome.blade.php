@extends('master')
@section('title', 'Homepage')

@section('content')
<div class="row">
  @for ($i=0; $i < 9; $i++)
  <div class="col-sm-4">
    <div class="panel panel-primary">
      <div class="panel-heading cenText">Video Games | PS4 Games</div>
      <div class="row">
        <div class="col-sm-6">
          <div class="panel-body"><img src="/images/cod2016.jpg" class="img-responsive" style="width:100%" alt="Image"><br>
          </div>
        </div>
        <div class="panel-body">
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
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-12">
          <p class="lead cenText">COD: Infinite Warfare</p>
        </div>
      </div>
      <div class="panel-footer cenText">
        <div class="row">
          <div class="col-sm-6">
            <a class="btn btn-primary btn-block btn-sm" href="#">Buy Item</a>
          </div>
          <div class="col-sm-6">
            <a class="btn btn-danger btn-block btn-sm" href="#">Sell Item</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endfor
</div>
@endsection