	@extends('master')
	@section('title', 'LGX Checkout')

	@section('content')
		@php $customer = Auth::guard('customer')->user() @endphp

		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="content-mid">
						<h3>Transaction Summary</h3>
						<label class="line"></label>
					</div>
					<br>
					@foreach ($buyCartItems as $cartItem)
						<div class="media">
							<div class="media-left">
								<a href="#">
									<img class="media-object orderPicSize" src="{{ asset('/images/'.$cartItem->options->platform.'/'.$cartItem->options->image_name) }}" alt="...">
								</a>
							</div>
							<div class="media-body">
								<ul class="list-group">
									<li class="list-group-item">Title - {{ $cartItem->name }}</li>
									<li class="list-group-item">Platform - {{ $cartItem->options->platform }}</li>
									<li class="list-group-item">Quantity - {{ $cartItem->qty }}</li>
									<li class="list-group-item">Price - &#8358;{{ number_format($cartItem->price, 2) }}</li>
								</ul>
							</div>
						</div>
					@endforeach
					<hr>
					<div class="row">
						<div class="col-sm-8">
						</div>
						<div class="col-sm-2 pull-left">
							<h3>Subtotal: </h3>
							<h3 class="padTop">Voucher: </h3><hr>
							<h3 class="">Delivery: </h3><br>
							<h2>TOTAL: </h2>
						</div>
						<div class="col-sm-2 pull-right">
								<h3>&#8358;{{ Cart::subtotal() }}</h3>
								<h3 class="padTop">&#8358;{{ number_format($voucher_value,2) }}</h3><hr>
								<h3 class="">&#8358;{{ number_format($delivery_charge,2) }}</h3><br>
								@php $subTotal = str_replace(',', '', Cart::subtotal()) @endphp
								@if(isset($voucher_value))
									@if ($voucher_value >= (int)$subTotal)
										@php $sumTotal = $delivery_charge;
										 		 $new_voucher = $voucher_value - (int)$subTotal @endphp
										<h2>&#8358;{{ number_format($sumTotal, 2) }}</h2>
									@elseif($voucher_value < (int)$subTotal)
										@php $sumTotal = ((int)$subTotal - $voucher_value) + $delivery_charge;
										     $new_voucher = 0 @endphp
										<h2>&#8358;{{ number_format($sumTotal, 2) }}</h2>
									@endif
								@else
									@php $sumTotal = (int)$subTotal + $delivery_charge;
										   $new_voucher = $customer->voucher_value @endphp
									<h2>&#8358;{{ number_format($sumTotal, 2) }}</h2>
								@endif
						</div>
					</div><hr>
					{{$new_voucher}}
					<div class="col-sm-3 pull-right">
						{!! Form::open(['route' => ['pay'], 'method' => 'POST']) !!}

						{{ Form::hidden('new_voucher', $new_voucher) }}

						{{ Form::hidden('email', $customer->email) }}
						{{ Form::hidden('amount', ($sumTotal)*100) }}
						{{ Form::hidden('reference_no', Paystack::genTranxRef()) }}
						{{ Form::hidden('key', config('paystack.secretKey')) }}

						{{ csrf_field() }}

						{{ Form::submit('Pay', ['class' => 'btn btn-success btn-block']) }}

						{!! Form::close() !!}
					</div>
				</div>
			</div><br>
		</div>

	@endsection
