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
            <div class="panel-body" style="overflow-y: scroll; height:380px">

              {!! Form::model($customer, ['route' => ['misc.updateInfo', $customer->id], 'method' => 'PUT']) !!}

              {{ Form::label('first_name', 'First Name') }}
              {{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name: ']) }}<br>

              {{ Form::label('last_name', 'Last Name') }}
              {{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name: ']) }}<br>

              {{ Form::label('email', 'Email Address') }}
              {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email: ']) }}<br>

              {{ Form::label('phone', 'Phone Number') }}
              {{ Form::tel('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone No: *']) }}<br>

              {{ Form::submit('Save Details', ['class' => 'btn btn-primary pull-right']) }}

              {!! Form::close() !!}
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">My Address</h3>
            </div>
            <div class="panel-body" style="overflow-y: scroll; height:380px">
              {!! Form::model($customer, ['route' => ['misc.updateDetails', $customer->id], 'method' => 'PUT']) !!}

              {{ Form::label('address', 'Address') }}
              {{ Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => 'Address: *', 'rows' => '4', 'cols' => '50']) }}<br>

              {{ Form::label('landmark', 'Landmark') }}
              {{ Form::textarea('landmark', null, ['class' => 'form-control', 'placeholder' => 'Landmark', 'rows' => '4', 'cols' => '50']) }}<br>

              {{ Form::label('state', 'State') }}
              {{ Form::select('state', ['Abuja' => 'Abuja'], null, ['class' => 'form-control', 'placeholder' => 'Select State']) }}<br>

              {{ Form::label('region', 'Region') }}
              {{ Form::select('region', ['Abaji' => 'Abaji', 'Abuja Municipal' => 'Abuja Municipal', 'Bwari' => 'Bwari', 'Gwagwalada' => 'Gwagwalada', 'Kuje' => 'Kuje', 'Kwali' => 'Kwali'], null, ['class' => 'form-control', 'placeholder' => 'Select Region']) }}<br>

              {{ Form::submit('Save Details', ['class' => 'btn btn-primary pull-right']) }}

              {!! Form::close() !!}
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
