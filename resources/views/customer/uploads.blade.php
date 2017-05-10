@extends('master')
@section('title', 'My Uploaded Games')
@section('content')
  @php
  $customer = Auth::guard('customer')->user()
  @endphp
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="content-mid">
          <h3>Uploaded Games</h3>
          <label class="line"></label>
        </div><br>
        @if ($uploads->Count())
        @foreach ($uploads as $order)
          <div class="col-sm-6">
        <div class="media">
          <div class="media-left">
            <a href="#">
              <img class="media-object orderPicSize" src="{{ asset($order->image_path) }}" alt="..." style="height:230px; width:auto">
            </a>
          </div>
          <div class="media-body">
            <ul class="list-group">
              <li class="list-group-item">Title - {{ $order->title }}</li>
              <li class="list-group-item">Platform - {{ $order->platform }}</li>
              <li class="list-group-item">Price - N{{ number_format($order->price,2) }}</li>
              <li class="list-group-item">Date Uploaded - {{ $order->created_at }}</li>
              <li class="list-group-item">Status - {{ $order->status }}</li>
            </ul>
          </div>
        </div>
        </div>
        @endforeach
        @else
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-center">
              <p class="lead">
                Move along! Nothing to see here. You don't have any games uploaded.
              </p>
            </div>
          </div>
        @endif
        <div class="text-center">
					{!! $uploads->links() !!}
				</div>
      </div>

    </div>
  </div>
@stop
