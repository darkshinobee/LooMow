@extends('master')
@section('title', 'Add Product')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3"><br>
			<h1 class="pull-left">Add New Product</h1>
			<div class="clearfix"></div><br>

			{{-- {!! Form::open(['route' => 'products.store']) !!} --}}
			{!! Form::open(['route' => 'products.store', 'files' => true]) !!}
			{{ csrf_field() }}
			{{ Form::label('title', 'Title:') }}
			{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
			<br>
			{{ Form::label('platform', 'Platform:') }}
			{{ Form::select('platform', ['PS4' => 'PS4', 'PS3' => 'PS3', 'Xbox360' => 'Xbox 360', 'XboxOne' => 'Xbox One', 'PSVita' => 'PS Vita', 'NintendoWii' => 'Nintendo Wii'], null,
				['class' => 'form-control', 'placeholder' => 'Select Platform', 'required']) }}
			<br>
			{{ Form::label('developer', 'Developer:') }}
			{{ Form::text('developer', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
			<br>
			{{ Form::label('genre', 'Genre:') }}
			{{ Form::select('genre', ['Action' => 'Action', 'Adventure' => 'Adventure', 'Racing' => 'Racing', 'Sports' => 'Sports', 'Simulation' => 'Simulation', 'Fighting' => 'Fighting', 'Kids' => 'Kids'], null,
				['class' => 'form-control', 'placeholder' => 'Select Genre', 'required']) }}
			<br>
			{{ Form::label('age_restriction', 'Age Restriction:') }}
			{{ Form::text('age_restriction', null, array('class' => 'form-control', 'required' => '')) }}
			<br>
			{{ Form::label('quantity', 'Quantity:') }}
			{{ Form::number('quantity', null, array('class' => 'form-control', 'required' => '')) }}
			<br>
			{{ Form::label('image_name', 'Image Name:') }}
			{{ Form::text('image_name', null, array('class' => 'form-control', 'required' => '')) }}
			<br>
			{{ Form::label('image_location', 'Upload Image:') }}
			{{ Form::file('image_location', array('class' => 'form-control', 'required' => '')) }}
			<br>
			{{ Form::label('release_date', 'Release Date:') }}
			{{ Form::date('release_date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
			<br>
			{{ Form::submit('Add Product', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px')) }}
			{!! Form::close() !!}
		</div>
	</div>
</div><br>

@stop
