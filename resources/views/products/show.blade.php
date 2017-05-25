@extends('master')
@section('title', 'Product Info Page')

@section('content')

  <!-- start -->
  <div class="col-md-12">
    <h2 class="text-center">{{ $product->title }}</h2><hr>
  </div>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6 grid">
              <div class="thumb-image"> <img src="{{ asset('/images/'.$product->platform.'/'.$product->image_name) }}" data-imagezoom="true" class="img-responsive"> </div>
            </div>
            <div class="col-md-6">
              <ul class="list-group">
                <li class="list-group-item">Platform: {{ $product->platform }}</li>
                <li class="list-group-item">Developer: {{ $product->developer }}</li>
                <li class="list-group-item">Genre: {{ $product->genre }}</li>
                <li class="list-group-item">Release Date: {{ $product->release_date }}</li>
                <li class="list-group-item">Age Rating: {{ $product->age_restriction }}</li>
                @if ($product->quantity > 0)
                  <li class="list-group-item">Status: <strong><span class="text-success">{{$product->quantity}} Remaining</span></strong></li>
                @else
                  <li class="list-group-item">Status: <strong><span class="text-danger">Out of Stock</span></strong></li>
                @endif
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="">
            <nav class="nav-sidebar">
              <ul class="nav tabs">
                <li class=""><a href="#tab1" data-toggle="tab">Read Reviews</a></li>
                <li class="active"><a href="#tab2" data-toggle="tab">Write A Review</a></li>
              </ul>
            </nav>

            <div class="tab-content one">

              <div class="tab-pane text-style" id="tab1" style="overflow-y: scroll; height:340px">
                @foreach($product->blog as $blog)
                  <div>
                    <p><strong>Name: </strong> {{ $blog->name }} </p>
                    <p><strong>Review: </strong> {{ $blog->body }} </p>
                  </div><hr>
                @endforeach
              </div>

              <div class="tab-pane active text-style" id="tab2">
                <div class="facts">
                  {{ Form::open(['route' => ['blogs.store', $product->id], 'method' => 'POST']) }}
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-sm-6">
                      {{ Form::label('name', "Name:") }}
                      {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-sm-12">
                      {{ Form::label('body', "Your Review:") }}
                      {{ Form::textarea('body', null, ['class' => 'form-control']) }}
                      <br>
                      {{ Form::submit('Post Review', ['class' => 'btn btnColor btn-block a_link']) }}
                    </div>
                  </div>
                  {{ Form::close() }}
                </div>
              </div>

            </div>
          </div>
        </div>
      </div><hr>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          @if ($obj->Count())
            @foreach ($obj as $ob)
              <div class="col-sm-4">
                <div class="panel panel-primary">
                  <div class="panel-body">
                    <img src="{{ $product->image_path }}" class="img-responsive"><hr>
                    <ul class="ul_bullet">
                      <li>Used for:</li>
                      <li class="list-group-item"><i>{{ $ob->purchase_time }}</i></li>
                      <li class="list-group-item">Price: &#8358;{{ number_format($ob->price,2) }}</li>
                    </ul><br>
                    <a href="{{ route('cart.addBuy', [$product->id, $ob->id]) }}" class="btn btnColor btn-block a_link">Add to Cart</a>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <h3 class="text-center">Oops! Seems we're out of stock.</h3>
          @endif
        </div>
      </div>
    </div>
  </div><br>

@endsection
