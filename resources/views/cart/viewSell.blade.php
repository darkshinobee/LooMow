@extends('master')
@section('title', 'Shopping Cart')

@section('content')

<div class="check-out">
  <div class="container">

    <div class="content-mid">
      <h3>Sell Cart</h3>
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
            @foreach($sellCartItems as $sellCartItem)
            <td class="ring-in"><a href="#" class="at-in"><img src="{{ asset('/images/'.$sellCartItem->options->platform.'/'.$sellCartItem->options->image_name) }}" class="img-responsive" alt=""></a>
              <div class="sed">
                <h5><a href="#">{{ $sellCartItem->name }}</a></h5><br>
                <ul class="ul_bullet dr">
                  <li>Platform - {{ $sellCartItem->options->platform }}</li>
                  <li>Developer - {{ $sellCartItem->options->developer }}</li>
                  <li>Genre - {{ $sellCartItem->options->genre }}</li>
                </ul>

              </div>
              <div class="clearfix"> </div>
            </td>
            <td class="dr">&#8358;{{ number_format($sellCartItem->price,2) }}</td>
            <td>
              {!! Form::open(['route' => ['cart.updateSell', $sellCartItem->rowId], 'method' => 'PUT']) !!}
              <select class="form-control" name="qty">
                @for ($i=1; $i <= $sellCartItem->options->quantity; $i++)
                <option value="{{$i}}" @if($i==$sellCartItem->qty) selected @endif >{{$i}}</option>
                @endfor
              </select><br>
              {{ Form::submit('Update', ['class' => 'btn btn-default btn-sm pull-right']) }}
              {!! Form::close() !!}
            </td>
            @php
            $sellTotal = $sellCartItem->price * $sellCartItem->qty
            @endphp
            <td class="dr">&#8358;{{ number_format($sellTotal,2) }}</td>
            <td>
              {!! Form::open(['route' => ['cart.removeSell', $sellCartItem->rowId], 'method' => 'POST']) !!}
              <button class="btn btn-danger btn-sm pull-right">Remove</button>
              {!! Form::close() !!}
            </td>
          </tr>
          @endforeach
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            @php
            $deliCharge = 100
            @endphp
            <th>Delivery Charge: 
              @if (Cart::subtotal() > 0)
              <span class="pull-right">&#8358;{{number_format($deliCharge,2)}}</span>
              @endif
              <br>
              Total: 
              @if (Cart::subtotal() > 0)
              <span class="pull-right">&#8358;{{ number_format(Cart::subtotal() + $deliCharge,2)}}</span>
              @endif
            </th>
          </tr>

        </table>
      </div>
    </div>
    <div class="produced pull-right">
      <button class="btn btn-primary btn-rec btn-lg">Checkout</button>
    </div>
  </div>
</div><br>

@endsection