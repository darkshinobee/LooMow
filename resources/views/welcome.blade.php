@extends('master')
@section('title', 'Homepage')

@section('content')

	<div class="content">

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!--products-->
					<div class="content-mid">
						<h3>All Games</h3>
						<label class="line"></label>
						<div class="mid-popular">

							@foreach ($products as $product)
								{{-- @if ($product->quantity > 0) --}}
								<div class="col-md-4 item-grid simpleCart_shelfItem">
									<div class="mid-pop">
										<div class="pro-img">
											<a href="{{ route('products.show', $product->slug) }}"><img src="{{ ($product->image_path) }}" class="img-responsive" alt=""></a>
										</div>
										<div class="mid-1">
											<div class="row">
												<div class="col-sm-12">
													<h6 class="text-center">{{ $product->title }}</h6>
												</div>
											</div>
											<div class="row padTop">
												<div class="col-sm-10 col-sm-offset-1">
													@if ($product->quantity > 0)
														<a href="{{ route('products.show', $product->slug) }}" class="btn btnColor btn-sm btn-block a_link">More Info</a>
													@else
														<button class="btn btn-danger btn-sm btn-block a_link" disabled="">Out of Stock</button>
													@endif
												</div>
											</div>
										</div>
									</div>
								</div>
								{{-- @endif --}}
							@endforeach
							<div class="clearfix"></div><br>
						</div>
					</div>
					<!--//products-->
					<div class="text-center">
						{!! $products->links() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
