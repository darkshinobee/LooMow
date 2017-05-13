@extends('master')
@section('title', 'Order Success')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="content-mid">
          <h3>Thank You! Your order has been placed.</h3>
          <label class="line"></label>
        </div><br><br>
        <div class="row">
          <div class="col-md-6">
            <p>Your order number is: {{ $tref }}</p>
            <p>An email receipt containing the details of your order has been sent to {{ $customer->email }}</p><br>
            <p>The order will be delivered to:</p><br>
            <ul class="ul_bullet">
              <li>{{ $customer->first_name.' '.$customer->last_name }}</li>
              <li>{{ $customer->address }}</li>
              @if ($customer->landmark)
                <li>{{ $customer->landmark }}</li>
              @endif
              <li>{{ $customer->state }}</li>
              <li>T: {{ $customer->phone }}</li>
              <li>E: {{ $customer->email }}</li>
            </ul><br>
            <div class="well well-sm">
              <h4>Any Enquiries?</h4>
              <p class="padTop">For enquiries regarding your order. Feel free to contact us @</p>
              <ul class="ul_bullet">
                <li>E: orders@loomow.com</li>
                <p>OR</p>
                <li>T: 0801 234 5678</li>
              </ul>
            </div>
            <h4>Thanks,</h4>
            <h4 class="padTop">LooMow</h4>
          </div>
          <div class="col-sm-6" style="overflow-y: scroll; height:450px">
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
        </div>
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3 text-center">
            <a href="/">
              <button class="btn bt-lg btnColor btn-block padTop a_link" type="button">Continue Shopping</button>
            </a>
          </div>
        </div>
      </div>
    </div><br>
  </div>
@endsection
