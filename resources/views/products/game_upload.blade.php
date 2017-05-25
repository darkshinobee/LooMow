@extends('master')
@section('title', 'Game Upload')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3"><br>
				<h1 class="text-center">Upload Your Game</h1>
				<hr>
				<a href="" data-toggle="modal" data-target="#myModal"><p class="pull-right" style="font-size:0.8em; color:royalblue">* Click here to update your address</p></a>
				{!! Form::open(['route' => 'uploads.store', 'files' => true, 'id' => 'upload_form']) !!}
				{{ csrf_field() }}

				{{ Form::label('title', 'Game Title:') }}
				{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
				<br>
				<div class="row">
					<div class="col-sm-6">
						{{ Form::label('platform', 'Platform:') }}
						{{ Form::select('platform', ['PS4' => 'PS4', 'PS3' => 'PS3', 'Xbox360' => 'Xbox 360', 'XboxOne' => 'Xbox One', 'PSVita' => 'PS Vita', 'NintendoWii' => 'Nintendo Wii'], null,
							['class' => 'form-control', 'required', 'placeholder' => 'Select Platform']) }}
					</div>
					<div class="col-sm-6">
						{{ Form::label('genre', 'Genre:') }}
						{{ Form::select('genre', ['Action' => 'Action', 'Adventure' => 'Adventure', 'Racing' => 'Racing', 'Sports' => 'Sports', 'Simulation' => 'Simulation', 'Fighting' => 'Fighting', 'Kids' => 'Kids'], null,
							 ['class' => 'form-control', 'required', 'placeholder' => 'Select Platform']) }}
					</div>
				</div><br>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{{ Form::label('price', 'Price: &#8358;') }}
						{{ Form::number('price', null, array('class' => 'form-control', 'required' => '')) }}
					</div>
					<div class="col-sm-6">
						{{ Form::label('platform', 'How long have you had the game:') }}
							<select class="form-control required" name="purchase_time">
								<option>--</option>
								<option value="Less than a month">Less than a month</option>
								<option value="1 month">1 month</option>
								@for ($i=2; $i <= 12; $i++)
									<option value="{{$i}} months">{{$i}} months</option>
								@endfor
								<option value="Over a year">Over a year</option>
							</select>
					</div>
				</div><br>
				<div class="row">
					<div class="col-sm-12">
						{{ Form::file('img_path', array('class' => 'form-control', 'required' => '')) }}
						<p style="font-size:0.6em; color:royalblue">* Image cannot be greater than 200kb</p>
					</div>
					{!! Form::close() !!}
					{{-- <div class="col-sm-6"> --}}
						{{-- <button class="btn btnColor btn-md pull-right btn-block a_link" type="button" data-toggle="modal" data-target="#myModal">Update Address</button> --}}
						<!-- Modal -->
						<div class="modal fade produced" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">LooMow</h4>
									</div>

									<div class="modal-body">
										<h3>YOUR DETAILS</h3><hr>
										<div class="row">
											<div class="col-sm-8 col-sm-offset-2">
												<div>
													<!-- Nav tabs -->
													<ul class="nav nav-tabs" role="tablist">
														<li role="presentation" class="active"><a href="#existingAddress" aria-controls="existingAddress" role="tab" data-toggle="tab">Existing Details</a></li>
														<li role="presentation"><a href="#newAddress" aria-controls="newAddress" role="tab" data-toggle="tab">Update Details</a></li>
													</ul>
													<!-- Tab panes -->
													<div class="tab-content">
														<div role="tabpanel" class="tab-pane active" id="existingAddress"><br>
															<div class="well well-sm">
																<ul class="ul_bullet">
																	<li>Name: {{ $customer->first_name .' '. $customer->last_name }}</li>
																	<li>Email: {{ $customer->email }}</li>
																	@if (!$customer->address)
																	</ul>
																</div>
																<h4>Click Next Tab To Add Details</h4>
															@else
																<li>Phone: {{ $customer->phone }}</li>
																<li>Address: {{ $customer->address }}</li>
																@if ($customer->landmark)
																	<li>Landmark: {{ $customer->landmark }}</li>
																@endif
																<li>State: {{ $customer->state }}</li>
																<li>Region: {{ $customer->region }}</li>
															</ul>
														</div>
													@endif
												</div>

												<div role="tabpanel" class="tab-pane" id="newAddress"><br>
													<div class="row">
														<div class="col-sm-12">
															<div class="well well-sm">
																<ul class="ul_bullet">
																	<li>Name: {{ $customer->first_name .' '. $customer->last_name }}</li>
																	<li>Email: {{ $customer->email }}</li>
																</ul>
															</div><br>

															{!! Form::model($customer, ['route' => ['misc.update', $customer->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}
															{{ csrf_field() }}
															{{ Form::label('phone', 'Phone Number', ['class' => 'pull-left']) }}
															{{ Form::tel('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone No: *', 'required' => '']) }}<br>

															{{ Form::label('address', 'Address', ['class' => 'pull-left']) }}
															{{ Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => 'Address: *', 'rows' => '4', 'cols' => '50', 'required' => '']) }}<br>

															{{ Form::label('landmark', 'Landmark', ['class' => 'pull-left']) }}
															{{ Form::textarea('landmark', null, ['class' => 'form-control', 'placeholder' => 'Landmark', 'rows' => '4', 'cols' => '50']) }}<br>

															{{ Form::label('state', 'State', ['class' => 'pull-left']) }}
															{{ Form::select('state', ['Abuja' => 'Abuja'], null, ['class' => 'form-control', 'placeholder' => 'Select State']) }}<br>

															{{ Form::label('region', 'Region', ['class' => 'pull-left']) }}
															{{ Form::select('region', ['Abaji' => 'Abaji', 'Abuja Municipal' => 'Abuja Municipal', 'Bwari' => 'Bwari', 'Gwagwalada' => 'Gwagwalada', 'Kuje' => 'Kuje', 'Kwali' => 'Kwali'], null, ['class' => 'form-control', 'placeholder' => 'Select Region', 'required' => '']) }}<br>

															{{ Form::submit('Save Details', ['class' => 'btn btn-primary pull-right']) }}

															{!! Form::close() !!}

														</div>
													</div><br>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				{{-- </div> --}}
			</div>
			@if ($customer->address)
				{{ Form::submit('Submit', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px', 'form' => 'upload_form')) }}
			@else
				<script type="text/javascript">
				    $(window).on('load',function(){
				        $('#myModal').modal('show');
				    });
				</script>
			@endif
		</div>
	</div>
</div><br>
@stop
