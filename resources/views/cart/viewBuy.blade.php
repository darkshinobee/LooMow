@extends('master')
@section('title', 'Buy Shopping Cart')

@section('content')
  @php
  $item = Auth::guard('customer')->user()
@endphp

<div class="check-out">
  <div class="container">

    <div class="content-mid">
      <h3>Buy Cart</h3>
      <label class="line"></label>
    </div>
    <br>

    <div class="bs-example4" data-example-id="simple-responsive-table">
      <div class="table-responsive">
        <table class="table-heading simpleCart_shelfItem table-bordered table">
          <tr>
            <th class="table-grid">Item</th>

            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th></th>
          </tr>
          <tr class="cart-header">
            @foreach($buyCartItems as $buyCartItem)
              <td class="ring-in"><a href="#" class="at-in"><img src="{{ asset('/images/'.$buyCartItem->options->platform.'/'.$buyCartItem->options->image_name) }}" class="img-responsive" alt=""></a>
                <div class="sed">
                  <h5><a href="#">{{ $buyCartItem->name }}</a></h5><br>
                  <ul class="ul_bullet dr">
                    <li>Platform - {{ $buyCartItem->options->platform }}</li>
                    <li>Developer - {{ $buyCartItem->options->developer }}</li>
                    <li>Genre - {{ $buyCartItem->options->genre }}</li>
                  </ul>

                </div>
                <div class="clearfix"> </div>
              </td>
              <td class="dr">&#8358;{{ number_format($buyCartItem->price, 2) }}</td>
              <td>
                {{-- <div class="input-prepend-append dr">
                <input class="text-center" type="number" min="1" max="{{ $buyCartItem->options->quantity }}" id="prod_qty" value="{{ $buyCartItem->qty }}">
              </div> --}}
              {{-- <label class="label label-default">{{ $buyCartItem->qty }}</label> --}}
              {!! Form::open(['route' => ['cart.updateBuy', $buyCartItem->rowId], 'method' => 'PUT']) !!}
              <select class="form-control" name="qty">
                @for ($i=1; $i <= $buyCartItem->options->quantity; $i++)
                  <option value="{{$i}}" @if($i==$buyCartItem->qty) selected @endif >{{$i}}</option>
                  @endfor
                </select><br>
                {{ Form::submit('Update', ['class' => 'btn btn-default btn-sm pull-right']) }}
                {!! Form::close() !!}
              </td>
              @php
              $buyTotal = $buyCartItem->price * $buyCartItem->qty
              @endphp
              <td class="dr">&#8358;{{ number_format($buyTotal,2) }}</td>
              <td>
                {!! Form::open(['route' => ['cart.removeBuy', $buyCartItem->rowId], 'method' => 'POST']) !!}
                <button class="btn btn-danger btn-sm pull-right">Remove</button>
                {!! Form::close() !!}
              </td>
            </tr>
          @endforeach
          <tr>
            <th class="text-info">
              <p>Your Voucher Value: &#8358;{{number_format($item->voucher_value,2)}}</p>
            </th>
            <td></td>
            <td></td>
            <td></td>
            @php
            $deliCharge = 100
            @endphp
            <th>Delivery Charge:
              @if (Cart::instance('buyCart')->Count() > 0)
                <span class="pull-right">&#8358;{{number_format($deliCharge,2)}}</span>
              @endif
              <br>
              Total:
              @if (Cart::instance('buyCart')->Count() > 0)
                <span class="pull-right">&#8358;{{ number_format(Cart::subtotal() + $deliCharge,2)}}</span>
              @endif
            </th>
          </tr>

        </table>
      </div>
    </div>
    <div class="produced pull-right">
      <button class="btn btn-primary btn-rec btn-lg" data-toggle="modal" data-target="#myModal">Checkout</button>

      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Checkout</h4>
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
                            <li>Name: {{ $item->first_name .' '. $item->last_name }}</li>
                            <li>Email: {{ $item->email }}</li>
                            @if (!$item->address)
                            </ul>
                          </div>
                          <h4>Click Next Tab To Add Details</h4>
                        @else
                          <li>Phone: {{ $item->phone }}</li>
                          <li>Address: {{ $item->address }}</li>
                          @if ($item->landmark)
                            <li>Landmark: {{ $item->landmark }}</li>
                          @endif
                          <li>State: {{ $item->state }}</li>
                          <li>Region: {{ $item->region }}</li>
                        </ul>
                      </div>
                      {{-- {!! Form::open(['route' => ['transaction.store']]) !!} --}}
                      {!! Form::open(['route' => ['pay'], 'method' => 'POST']) !!}

                      {{ Form::hidden('customer_id', $item->id) }}
                      {{ Form::hidden('email', $item->email) }}
                      {{ Form::hidden('amount', 20000) }}
                      {{ Form::hidden('quantity', 1) }}
                      {{ Form::hidden('reference_no', Paystack::genTranxRef()) }}
                      {{ Form::hidden('key', config('paystack.secretKey')) }}
                      {{ csrf_field() }}

                      {{ Form::submit('Proceed', ['class' => 'btn btn-primary pull-right']) }}

                      {!! Form::close() !!}
                    @endif
                  </div>

                  <div role="tabpanel" class="tab-pane" id="newAddress"><br>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="well well-sm">
                          <ul class="ul_bullet">
                            <li>Name: {{ Auth::guard('customer')->user()->first_name .' '. Auth::guard('customer')->user()->last_name }}</li>
                            <li>Email: {{ Auth::guard('customer')->user()->email }}</li>
                          </ul>
                        </div><br>

                        {!! Form::open(['route' => ['misc.update', $item->id], 'method' => 'PUT']) !!}

                        {{ Form::tel('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone No: *']) }}<br>

                        {{ Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => 'Address: *', 'rows' => '4', 'cols' => '50']) }}<br>

                        {{ Form::textarea('landmark', null, ['class' => 'form-control', 'placeholder' => 'Landmark', 'rows' => '4', 'cols' => '50']) }}<br>

                        {{ Form::select('state', ['Abuja' => 'Abuja'], null, ['class' => 'form-control', 'placeholder' => 'Select State']) }}<br>

                        {{ Form::select('region', ['Abaji' => 'Abaji', 'Abuja Municipal' => 'Abuja Municipal', 'Bwari' => 'Bwari', 'Gwagwalada' => 'Gwagwalada', 'Kuje' => 'Kuje', 'Kwali' => 'Kwali'], null, ['class' => 'form-control', 'placeholder' => 'Select Region']) }}<br>

                        {{ Form::submit('Save & Proceed', ['class' => 'btn btn-primary pull-right']) }}

                        {!! Form::close() !!}

                      </div>
                    </div><br>
                  </div>
                </div>
              </div>
            </div>
          </div><hr>
          <h3>VOUCHER</h3><hr>
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
              <p class="pull-left">Your Voucher Value: &#8358;{{ number_format($item->voucher_value,2) }}</p>
              @if($item->voucher_value > 0)
                <form>
                  <input type="checkbox" name="voucher_value"> Use Voucher
                </form>
              @endif
            </div>
          </div>
        </div>
        <div class="modal-footer">
          @if (Cart::instance('buyCart')->Count() > 0)
            <h3 class="pull-right">TOTAL: &#8358;{{ number_format(Cart::subtotal() + $deliCharge,2) }}</h3>
          @endif
        </div>
      </div>
    </div>
  </div>

</div>
<div class="clearfix"> </div>
<br>
</div>
</div><br>

@endsection
