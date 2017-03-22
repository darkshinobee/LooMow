@extends('master')
@section('title', 'My Account')

@section('content')
  @php
    $customer = Auth::guard('customer')->user()
  @endphp
@stop
