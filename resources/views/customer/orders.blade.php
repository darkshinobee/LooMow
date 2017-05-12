@extends('master')
@section('title', 'My Orders')
@section('content')
  @php
  $customer = Auth::guard('customer')->user()
  @endphp
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="content-mid">
          <h3>Transaction History</h3>
          <label class="line"></label>
        </div><br>
        @if ($orders->Count())
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
              <td>&#8358;{{ number_format($order->price, 2) }}</td>
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
        @else
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-center">
              <p class="lead">
                Move along! Nothing to see here. You don't have any existing orders.
              </p>
            </div>
          </div>
        @endif
        <div class="text-center">
					{!! $orders->links() !!}
				</div>
      </div>

    </div>
  </div>
  @php
    unset($orders);
  @endphp
@stop
