@extends('master')
@section('title', 'Product Info Page')

@section('content')

<!-- start -->
<div class="single">
  <div class="container">
    <div class="col-md-9">

      <div class="col-md-5 grid">
        <div class="thumb-image"> <img src="{{ asset('/images/'.$product->platform.'/'.$product->image_name) }}" data-imagezoom="true" class="img-responsive"> </div>
      </div>
      <div class="col-md-7 single-top-in">

        <div class="span_2_of_a1 simpleCart_shelfItem">
          <h3>{{ $product->title }}</h3><br>
          <div class="row">
            <div class="col-sm-6 text-center">
              <span class="item_price">&#8358;{{ number_format($product->sell_rate,2) }}</span>
            </div>
            <div class="col-sm-6">
              <button class="btn btn-primary btn-md btn-block btn-rec">Buy</button>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-6 text-center">
              <span class="item_price">&#8358;{{ number_format($product->buy_rate,2) }}</span>
            </div>
            <div class="col-sm-6">
              <button class="btn btn-danger btn-md btn-block btn-rec">Sell</button>
            </div>
          </div>

          <h4 class="quick">Quick Overview:</h4><br>
          <ul class="list-group">
            <li class="list-group-item">Platform: {{ $product->platform }}</li>
            <li class="list-group-item">Developer: {{ $product->developer }}</li>
            <li class="list-group-item">Genre: {{ $product->genre }}</li>
            <li class="list-group-item">Release Date: {{ $product->release_date }}</li>
            @if ($product->quantity > 0)
            <li class="list-group-item">Status: <strong><span class="text-success">In Stock</span></strong></li>
            @else
            <li class="list-group-item">Status: <strong><span class="text-danger">Out of Stock</span></strong></li>
            @endif
          </ul>
        </div>

      </div>
      <div class="clearfix"> </div>
      <!---->
      <div class="tab-head">
       <nav class="nav-sidebar">
        <ul class="nav tabs">
          <li class="active"><a href="#tab1" data-toggle="tab">Read Reviews</a></li>
          <li class=""><a href="#tab2" data-toggle="tab">Write A Review</a></li>
        </ul>
      </nav>

      <div class="tab-content one">

        <div class="tab-pane active text-style" id="tab1">
         @foreach($product->blog as $blog)
         <div class="facts">
         <p><strong>Name: </strong> {{ $blog->name }} </p>
         <p><strong>Review: </strong> {{ $blog->body }} </p>
        </div>
        @endforeach
      </div>

      <div class="tab-pane text-style" id="tab2">
        <div class="facts">
          {{ Form::open(['route' => ['blogs.store', $product->id], 'method' => 'POST']) }}
          <div class="row">
            <div class="col-sm-6">
              {{ Form::label('name', "Name:") }}
              {{ Form::text('name', null, ['class' => 'form-control']) }}
            </div>
            <div class="col-sm-12">
              {{ Form::label('body', "Your Review:") }}
              {{ Form::textarea('body', null, ['class' => 'form-control']) }}
              <br>
              {{ Form::submit('Post Review', ['class' => 'btn btn-primary btn-block']) }}
            </div>
          </div>
          {{ Form::close() }}
        </div>
      </div>

    </div>
  </div>

</div>
</div>
</div><br>

@endsection
