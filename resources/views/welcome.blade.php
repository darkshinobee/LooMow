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
								@if ($product->quantity > 0)
								<div class="col-md-4 item-grid simpleCart_shelfItem">
									<div class="mid-pop">
										<div class="pro-img">
											<a href="/products/{{ $product->id }}"><img src="{{ ($product->image_path) }}" class="img-responsive" alt=""></a>
										</div>
										<div class="mid-1">
											<div class="row">
												<div class="col-sm-12">
													<h6 class="text-center">{{ $product->title }}</h6>
												</div>
											</div>
											<div class="row padTop">
												<div class="col-sm-10 col-sm-offset-1">
													<form action="{{ route('cart.addBuy', $product->id) }}">
														<input class="btn btnColor btn-sm btn-block" type="submit" value="Buy for">
													</form>
												</div>
											</div>
											<div class="row text-center padTop">
												<div class="col-sm-12">
													<p class="item_price">&#8358;{{ number_format($product->price,2) }}</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endif
							@endforeach
							<div class="clearfix"></div>
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
