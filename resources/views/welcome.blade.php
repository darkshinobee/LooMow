@extends('master')
@section('title', 'Homepage')

@section('content')

<div class="content">
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!--products-->
				<div class="content-mid">
					<h3>Trending Games</h3>
					<label class="line"></label>
					<div class="mid-popular">
						
						@foreach ($products as $product)
						<div class="col-md-4 item-grid simpleCart_shelfItem">
							<div class="mid-pop">
								<div class="pro-img">
									<a href="products/{{ $product->id }}"><img src="{{ ($product->image_path) }}" class="img-responsive" alt=""></a>
								</div>
								<div class="mid-1">
									<div class="row">
										<div class="col-sm-12">
											<h6 class="text-center">{{ $product->title }}</h6>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-sm-6">
												<form action="{{ route('cart.addBuy', $product->id) }}">
												<input class="btn btn-primary btn-sm btn-block" type="submit" value="Buy">
											</form>
										</div>
										<div class="col-sm-6">
											<form action="{{ route('cart.addSell', $product->id) }}">
												<input class="btn btn-danger btn-sm btn-block" type="submit" value="Sell">
											</form>
										</div>
									</div>
									<div class="row text-center">
										<div class="col-sm-6">
											<p><em class="item_price">&#8358;{{ number_format($product->sell_rate,2) }}</em></p>
										</div>
										<div class="col-sm-6">
											<p><em class="item_price">&#8358;{{ number_format($product->buy_rate,2) }}</em></p>
										</div>
									</div>

								</div>
							</div>
						</div>
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