@extends('master')
@section('title', 'Product Page Test')

@section('content')

<div class="check-out">
  <div class="container">

    <div class="bs-example4" data-example-id="simple-responsive-table">
      <div class="table-responsive">
        <table class="table-heading simpleCart_shelfItem">
          <tr>
            <th class="table-grid">Item</th>

            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
          </tr>
          <tr class="cart-header">

            <td class="ring-in"><a href="#" class="at-in"><img src="images/ps4/cod2016.jpg" class="img-responsive" alt=""></a>
              <div class="sed">
                <h5><a href="#">Call of Duty: Infinite Warfare</a></h5><br>
                <ul class="ul_bullet dr">
                  <li>Platform - PS4</li>
                  <li>Developer - Activision</li>
                  <li>Genre - Action</li>
                </ul>

              </div>
              <div class="clearfix"> </div>
              <div class="close1"> </div>
            </td>
              <td class="dr">N00.00</td>
              <td>
                <div class="input-prepend-append dr">
                  <input class="text-center" type="number" min="1" max="5" id="prod_qty" value="1">
                </div>
              </td>
              <td class="dr">N00.00</td>
            </tr>

          </table>
        </div>
      </div>
      <div class="produced">
        <button class="btn btn-primary btn-rec btn-lg">Checkout</button>
      </div>
    </div>
  </div><br>

  @endsection