@extends('master')
@section('title', 'My Orders')

@section('content')
  @php
  $customer = Auth::guard('customer')->user()
  @endphp
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

        @foreach ($customer->transactions as $order)

        <div class="table-responsive">
          <table class="table table-condensed">
            <thead>
              <th>Order Reference</th>
              <th>Order Date</th>
              <th>Order Total</th>
            </thead>
            <tr>
              <td>{{ $order->product_id }}</td>
              <td></td>
              <td></td>
            </tr>
          </table>
        </div>
        <div class="media">
          <div class="media-left">
            <a href="#">
              <img class="media-object orderPicSize" src="" alt="...">
            </a>
          </div>
          <div class="media-body">
            <ul class="list-group">
              <li class="list-group-item">Title - </li>
              <li class="list-group-item">Platform - </li>
              <li class="list-group-item">Quantity - </li>
              <li class="list-group-item">Status - </li>
            </ul>
          </div>
        </div>
        @endforeach
      </div>

    </div>
  </div>
@stop
