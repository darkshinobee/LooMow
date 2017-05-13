@extends('master')
@section('title', 'Game Upload')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3"><br>
				<h1 class="text-center">Upload Your Game</h1>
				<hr>
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
						<br><br>
					</div>
					<div class="col-sm-6">
						{{ Form::label('genre', 'Genre:') }}
						{{ Form::select('genre', ['Action' => 'Action', 'Adventure' => 'Adventure', 'Racing' => 'Racing', 'Sports' => 'Sports', 'Simulation' => 'Simulation', 'Fighting' => 'Fighting', 'Kids' => 'Kids'], null,
							 ['class' => 'form-control', 'required', 'placeholder' => 'Select Platform']) }}
						<br><br>
					</div>
				</div>
				<hr>
				<h3 class="text-center">Price Range</h3>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{{ Form::label('min_rate', 'Min Rate: &#8358;') }}
						{{ Form::number('min_rate', null, array('class' => 'form-control', 'required' => '')) }}
						<br>
					</div>
					<div class="col-sm-6">
						{{ Form::label('max_rate', 'Max Rate: &#8358;') }}
						{{ Form::number('max_rate', null, array('class' => 'form-control', 'required' => '')) }}
						<br>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						{{-- {{ Form::label('img_path', 'Upload Image:') }} --}}
						{{ Form::file('img_path', array('class' => 'form-control', 'required' => '')) }}
						<p style="font-size:0.6em; color:royalblue">* Image cannot be greater than 200kb</p>
					</div>
					{!! Form::close() !!}
					<div class="col-sm-6">
						<button class="btn btnColor btn-md pull-right btn-block a_link" type="button" data-toggle="modal" data-target="#myModal">Update Address</button>
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
				</div>
			</div>
			@if ($customer->address)
				{{ Form::submit('Submit', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px', 'form' => 'upload_form')) }}
				{{-- {!! Form::close() !!} --}}
			@endif
		</div>
	</div>
</div><br>

@stop
