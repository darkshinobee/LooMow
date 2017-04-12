@extends('master')
@section('title', 'Game Upload')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3"><br>
			<h1 class="text-center">Upload Your Game</h1>
			<hr>
			{{-- {!! Form::open(['route' => 'products.store']) !!} --}}
			{!! Form::open(['route' => 'products.store', 'files' => true]) !!}
			{{ Form::label('title', 'Game Title:') }}
			{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
			<br>
      <div class="row">
			  <div class="col-sm-6">
          {{ Form::label('platform', 'Platform:') }}
    			{{ Form::select('platform', ['PS4' => 'PS4', 'PS3' => 'PS3', 'Xbox360' => 'Xbox 360', 'XboxOne' => 'Xbox One', 'PSVita' => 'PS Vita', 'NintendoWii' => 'Nintendo Wii'], ['class' => 'form-control']) }}
    			<br><br>
			  </div>
        <div class="col-sm-6">
          {{ Form::label('genre', 'Genre:') }}
    			{{ Form::select('genre', ['Action' => 'Action', 'Adventure' => 'Adventure', 'Racing' => 'Racing', 'Sports' => 'Sports', 'Simulation' => 'Simulation', 'Fighting' => 'Fighting'], ['class' => 'form-control']) }}
    			<br><br>
        </div>
			</div>
      <hr>
      <h3 class="text-center">Price Range</h3>
      <hr>
			<div class="row">
			  <div class="col-sm-6">
          {{ Form::label('sell_rate', 'Min Rate: &#8358;') }}
    			{{ Form::number('sell_rate', null, array('class' => 'form-control', 'required' => '')) }}
    			<br>
			  </div>
        <div class="col-sm-6">
          {{ Form::label('buy_rate', 'Max Rate: &#8358;') }}
          {{ Form::number('buy_rate', null, array('class' => 'form-control', 'required' => '')) }}
          <br>
        </div>
			</div>
			{{ Form::label('image_location', 'Upload Image:') }}
			{{ Form::file('image_location', null, array('class' => 'form-control', 'required' => '')) }}
			<br>
			{{ Form::submit('Submit', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px')) }}
			{!! Form::close() !!}
		</div>
	</div>
</div><br>

@stop
