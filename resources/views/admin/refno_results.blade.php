@extends('admin_master')
@section('title', 'Reference No')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Search Results</h2>
        <br>
        @if ($results->Count())
          <div class="row">
<div class="col-sm-8">
          @foreach ($results as $result)
            <div class="">
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object orderPicSize" src="{{ asset($result->image_path) }}" alt="..."
                    style="max-width:240px; height:245px;">
                  </a>
                </div>
                <div class="media-body">
                  <ul class="list-group">
                    <li class="list-group-item">Title - {{ $result->title }}</li>
                    <li class="list-group-item">Platform - {{ $result->platform }}</li>
                    <li class="list-group-item">Reference Number - {{ $result->reference_no }}</li>
                    <li class="list-group-item">Price - &#8358;{{ number_format($result->price,2) }}</li>
                  </ul>
                </div>
              </div>
            </div>
            @endforeach
            </div>
          </div><br>
            <div class="col-sm-8 col-sm-offset-2">
              <a href="/admin_lgx/delivery_update/{{ $result->id }}">
              <button class="btn btn-primary btn-block">Update to Delivered</button>
              </a>
            </div><br><br>
        @else
          <p class="lead">
            Sorry! No match found.
          </p>
        @endif
      </div>
    </div>
  </div>
@stop
