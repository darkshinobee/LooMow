@extends('admin_master')
@section('title', 'Games Delivered')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
          <h3>Successful Deliveries</h3>
        </div><br><br>
        @if ($temps->Count())
          <form action="{{ url('/admin_lgx/search_refno') }}">
            <div style="margin-top:10px" class="input-group input-group-sm">
              <input type="text" class="form-control" placeholder="Search By Reference No" name="refno"
              aria-describedby="sizing-addon3">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="submit">Go!</button>
              </span>
            </div>
          </form><br>
        @foreach ($temps as $temp)
          <div class="">
        <div class="media row">
          <div class="media-left col-sm-2">
            <a href="#">
              <img class="media-object orderPicSize" src="{{ asset($temp->image_path) }}" alt="..."
              style="max-width:240px; height:200px;">
            </a>
          </div>
          <div class="media-body">
            <ul class="list-group col-sm-5">
              <li class="list-group-item">Title - {{ $temp->title }}</li>
              <li class="list-group-item">Platform - {{ $temp->platform }}</li>
              <li class="list-group-item">Status - {{ $temp->status }}</li>
              <li class="list-group-item">Date - {{ $temp->updated_at }}</li>
            </ul>
          </div>
        </div><br>
      </div>
        @endforeach
        @else
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-center">
              <p class="lead">
                Move along! Nothing to see here. No games delivered.
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
