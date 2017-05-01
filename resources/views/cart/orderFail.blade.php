@extends('master')
@section('title', 'Order Fail')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="content-mid">
          <h3>Transaction Failed</h3>
          <label class="line"></label>
        </div><br>
        <div class="row">
          <div class="col-sm-6">
            <p>Oops! Looks like your order has not been processed.</p>
            <p>Your failed transaction reference is: {{ $failRef }}.</p>
            <p>Your game cart has not been emptied. Go to your cart and checkout again.</p>
            <p>We apologize for any inconvenience.</p><br>
            <div class="well well-sm">
              <h4>Any Enquiries?</h4>
              <p class="padTop">For enquiries regarding your order. Feel free to contact us @</p>
              <ul class="ul_bullet">
                <li>E: orders@loomow.com</li>
                <p>OR</p>
                <li>T: 0801 234 5678</li>
              </ul>
            </div>
            <h4>Thank you</h4>
            <h4 class="padTop">The LooMow Team</h4>
          </div>
          <div class="col-sm-6" style="overflow-y: scroll; height:320px">
            @foreach ($myCart as $mc)
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object orderPicSize" src="{{ asset('/images/'.$mc->options->platform.'/'.$mc->options->image_name) }}" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <ul class="list-group">
                    <li class="list-group-item">Title - {{ $mc->name }}</li>
                    <li class="list-group-item">Quantity - {{ $mc->qty }}</li>
                    <li class="list-group-item">Price - &#8358;{{ number_format($mc->price,2) }}</li>
                  </ul>
                </div>
              </div>
            @endforeach
          </div>
        </div><br>
      </div>
    </div>
  </div>
@endsection
