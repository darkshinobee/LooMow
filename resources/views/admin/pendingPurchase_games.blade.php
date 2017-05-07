@extends('admin_master')
@section('title', 'Awaiting Purchase')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
          <h3>Games Awaiting Purchase</h3>
        </div><br><br>
        @if ($temps->Count())
        @foreach ($temps as $temp)
          <div class="">
        <div class="media row">
          <div class="media-left col-sm-3">
            <a href="#">
              <img class="media-object orderPicSize" src="{{ asset($temp->img_path) }}" alt="..."
              style="max-width:240px; height:245px;">
            </a>
          </div>
          <div class="media-body">
            <ul class="list-group col-sm-6">
              <li class="list-group-item">Title - {{ $temp->title }}</li>
              <li class="list-group-item">Platform - {{ $temp->platform }}</li>
              <li class="list-group-item">Status - {{ $temp->status }}</li>
              <li class="list-group-item">Date Uploaded - {{ $temp->created_at }}</li>
            </ul>
          </div>
        </div><br>
      </div>
        @endforeach
        @else
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-center">
              <p class="lead">
                Move along! Nothing to see here. You don't have any existing transactions.
              </p>
            </div>
          </div>
        @endif
        <div class="text-center">
					{!! $temps->links() !!}
				</div>
      </div>

    </div>
  </div>
@stop
