@extends('admin_master')
@section('title', 'Uploaded Games')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
          <h3>Temp Uploads</h3>
        </div><br><br>
        @if ($temps->Count())
        @foreach ($temps as $temp)
          <div class="">
        <div class="media row">
          <div class="media-left col-sm-3">
            <a href="#">
              <img class="media-object orderPicSize" src="{{ asset($temp->img_path) }}" alt="..."
              style="max-width:240px; height:345px;">
            </a>
          </div>
          <div class="media-body">
            <ul class="list-group col-sm-6">
              <li class="list-group-item">Title - {{ $temp->title }}</li>
              <li class="list-group-item">Platform - {{ $temp->platform }}</li>
              <li class="list-group-item">Genre - {{ $temp->genre }}</li>
              <li class="list-group-item">Min Rate - &#8358;{{ number_format($temp->min_rate,2) }}</li>
              <li class="list-group-item">Max Rate - &#8358;{{ number_format($temp->max_rate,2) }}</li>
              <li class="list-group-item">Status - {{ $temp->status }} | PiD - {{ $temp->product_id }}</li>
              <li class="list-group-item">Date Uploaded - {{ $temp->created_at }}</li>
            </ul>
            <div class="col-sm-2 pull-right">
              <a href="/admin_lgx/approve/{{$temp->id}}">
              <button class="btn btn-success btn-block">Approve</button>
              </a>
              <br>
              <a href="/admin_lgx/disapprove/{{$temp->id}}">
              <button class="btn btn-danger btn-block">Disapprove</button>
            </a><br>
              <form action="/admin_lgx/update_id/{{$temp->id}}">
                <div style="" class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Update ID" name="id"
                  aria-describedby="sizing-addon3">
                </div>
              </form>
            </div>
          </div>
        </div><br>
      </div>
        @endforeach
        @else
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-center">
              <p class="lead">
                Move along! Nothing to see here. No games uploaded.
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
