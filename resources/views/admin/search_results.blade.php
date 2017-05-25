@extends('admin_master')
@section('title', 'Uploaded Games')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Search Results</h2>
        <br>
        @if ($results->Count())
          @foreach ($results as $result)
            <div class="">
              <div class="media row">
                <div class="media-left col-sm-3">
                  <a href="#">
                    <img class="media-object orderPicSize" src="{{ asset($result->image_path) }}" alt="..."
                    style="max-width:240px; height:245px;">
                  </a>
                </div>
                <div class="media-body">
                  <ul class="list-group col-sm-6">
                    <li class="list-group-item">ID - {{ $result->id }}</li>
                    <li class="list-group-item">Title - {{ $result->title }}</li>
                    <li class="list-group-item">Platform - {{ $result->platform }}</li>
                    <li class="list-group-item">Quantity - {{ $result->quantity }}</li>
                  </ul>
                </div>
              </div><br>
            </div>
          @endforeach
        @else
          <p class="lead">
            Sorry! No match found.
          </p>
        @endif
        <div class="text-center">
          {!! $results->links() !!}
        </div>
      </div>
    </div>
  </div>
@stop
