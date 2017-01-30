@extends('master')
@section('title', 'Product Page Test')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2"></div>
  <h3 class="cenText">Buy Item/s From Us</h3>
</div><br>

{{-- Buy Item Cart --}}
<table class="table table-hover">
  <thead>
    <tr>
      <th>Item</th>
      <th>Quantity</th>
      <th class="text-center">Price</th>
      <th class="text-center">Total</th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="col-sm-8 col-md-6">
        <div class="media">
          <a class="pull-left" href="#"> <img class="media-object thumbnail_size" src="/images/cod2016.jpg"> </a>
          <div class="media-body">
            <h4 class="media-heading"><a href="#">COD: Infinite Warfare</a></h4>
            <h5 class="media-heading"> by <a href="#">AcTiVision</a></h5>
            <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
          </div>
        </div></td>
        <td class="col-sm-1 col-md-1" style="text-align: center">
          <input type="email" class="form-control" id="exampleInputEmail1" value="3">
        </td>
        <td class="col-sm-1 col-md-1 text-center"><strong>N0.00</strong></td>
        <td class="col-sm-1 col-md-1 text-center"><strong>N00.00</strong></td>
        <td class="col-sm-1 col-md-1">
          <button type="button" class="btn btn-danger">
            <span class="glyphicon glyphicon-remove"></span> Remove
          </button></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td>   </td>
          <td>   </td>
          <td>   </td>
          <td><h5>Subtotal<br>Estimated shipping</h5><h3>Total</h3></td>
          <td class="text-right"><h5><strong>N00.00<br>N0.00</strong></h5><h3>N00.00</h3></td>
        </tr>
        <tr>
          <td>   </td>
          <td>   </td>
          <td>   </td>
          <td>
            <button type="button" class="btn btn-default">
              <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
            </button></td>
            <td>
              <button type="button" class="btn btn-success">
                Checkout <span class="glyphicon glyphicon-play"></span>
              </button></td>
            </tr>
          </tfoot>
        </table>

        {{-- Sell Item Cart --}}
        <div class="row">
          <div class="col-md-8 col-md-offset-2"></div>
          <h3 class="cenText">Sell Item/s To Us</h3>
        </div><br>

        <table class="table table-hover">
          <thead>
            <tr>
              <th>Item</th>
              <th>Quantity</th>
              <th class="text-center">Price</th>
              <th class="text-center">Total</th>
              <th> </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="col-sm-8 col-md-6">
                <div class="media">
                  <a class="pull-left" href="#"> <img class="media-object thumbnail_size" src="/images/cod2016.jpg"> </a>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="#">COD: Infinite Warfare</a></h4>
                    <h5 class="media-heading"> by <a href="#">AcTiVision</a></h5>
                    <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                  </div>
                </div></td>
                <td class="col-sm-1 col-md-1" style="text-align: center">
                  <input type="email" class="form-control" id="exampleInputEmail1" value="3">
                </td>
                <td class="col-sm-1 col-md-1 text-center"><strong>N0.00</strong></td>
                <td class="col-sm-1 col-md-1 text-center"><strong>N00.00</strong></td>
                <td class="col-sm-1 col-md-1">
                  <button type="button" class="btn btn-danger">
                    <span class="glyphicon glyphicon-remove"></span> Remove
                  </button></td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td>   </td>
                  <td>   </td>
                  <td>   </td>
                  <td><h5>Subtotal<br>Estimated shipping</h5><h3>Total</h3></td>
                  <td class="text-right"><h5><strong>N00.00<br>N0.00</strong></h5><h3>N00.00</h3></td>
                </tr>
                <tr>
                  <td>   </td>
                  <td>   </td>
                  <td>   </td>
                  <td>
                    <button type="button" class="btn btn-default">
                      <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                    </button></td>
                    <td>
                      <button type="button" class="btn btn-success">
                        Checkout <span class="glyphicon glyphicon-play"></span>
                      </button></td>
                    </tr>
                  </tfoot>
                </table>

                @endsection