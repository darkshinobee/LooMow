@extends('master')
@section('title', 'My Account')

@section('content')
@php
  $customer = Auth::guard('customer')->user()
@endphp
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1 class="text-center">My Account</h1>
      <label class="line"></label><br>
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Account Information</h3>
            </div>
            <div class="panel-body" style="overflow-y: scroll; height:120px">
              <p>Name: {{$customer->first_name.' '.$customer->last_name}}</p>
              <p>Email: {{$customer->email}}</p>
              <p>Phone Number: {{$customer->phone}}</p>
              <a href="#">Change Password</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">My Address</h3>
            </div>
            <div class="panel-body" style="overflow-y: scroll; height:120px">
              <p>Address: {{$customer->address}}</p>
              <p>Landmark: {{$customer->landmark}}</p>
              <p>State: {{$customer->state}}</p>
              <p>Region: {{$customer->region}}</p>
            </div>
          </div>
        </div>
      </div><hr><br>
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Newsletter Subscription</h3>
            </div>
            <div class="panel-body" style="overflow-y: scroll; height:100px">
              <p>You are currently not subscribed to any of our newsletters.</p>
              <a href="#">Subscribe</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">My Voucher</h3>
            </div>
            <div class="panel-body" style="overflow-y: scroll; height:100px">
              <p>You currently have &#8358;{{number_format($customer->voucher_value,2)}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
