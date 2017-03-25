@extends('master')
@section('title', 'My Orders')
@section('content')
  @php
  $customer = Auth::guard('customer')->user()
  @endphp
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        @foreach ($orders as $order)

        <div class="table-responsive">
          <table class="table table-condensed">
            <thead>
              <th>Order Reference</th>
              <th>Order Date</th>
              <th>Order Total</th>
            </thead>
            <tr>
              <td>{{ $order->reference_no }}</td>
              <td>{{ date('F d, Y h:i a', strtotime($order->created_at)) }}</td>
              <td>{{ $order->price }}</td>
            </tr>
          </table>
        </div>
        <div class="media">
          <div class="media-left">
            <a href="#">
              <img class="media-object orderPicSize" src="{{ asset('/images/'.$order->platform.'/'.$order->image_name) }}" alt="...">
            </a>
          </div>
          <div class="media-body">
            <ul class="list-group">
              <li class="list-group-item">Title - {{ $order->title }}</li>
              <li class="list-group-item">Platform - {{ $order->platform }}</li>
              <li class="list-group-item">Quantity - {{ $order->quantity }}</li>
              <li class="list-group-item">Status - {{ $order->status }}</li>
            </ul>
          </div>
        </div>
        @endforeach
      </div>

    </div>
  </div>
@stop
