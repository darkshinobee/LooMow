@extends('master')
@section('title', 'Order Success')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <h2 class="text-center">Thank You! Your order has been placed.</h2><br>
        <div class="row">
          <div class="col-md-6">
            <p>Your order number is: 000000000</p>
            <p>An email receipt containing the details of your order has been sent to youremail@me.com</p><br>
            <p>The order will be delivered to:</p><br>
            <ul class="ul_bullet">
              <li>John Doe</li>
              <li>My cool address</li>
              <li>Some landmark near me</li>
              <li>T: 0801 234 5678</li>
              <li>E: me@email.com</li>
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
          </div>
          <div class="col-sm-6">

          </div>
        </div>
      </div>
    </div><br>
  </div>
@endsection
