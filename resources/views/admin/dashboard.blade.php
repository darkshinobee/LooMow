@extends('admin_master')
@section('title', 'Admin Dashboard')

@php
$admin = Auth::guard('admin')->user()
@endphp

@section('content')
  <div class="row">
    <div class="col-xl-3 col-lg-6">
      <div class="card card-primary card-inverse">
        <div class="card-header card-primary">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-comments fa-5x"></i>
            </div>
            <div class="col-xs-9 text-xs-right">
              <div class="huge">26</div>
              <div>New Comments!</div>
            </div>
          </div>
        </div>
        <div class="card-footer card-default">
          <a href="javascript:;">
            <span class="pull-xs-left">View Details</span>
            <span class="pull-xs-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </a>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6">
      <div class="card card-green card-inverse">
        <div class="card-header card-green">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-tasks fa-5x"></i>
            </div>
            <div class="col-xs-9 text-xs-right">
              <div class="huge">12</div>
              <div>New Tasks!</div>
            </div>
          </div>
        </div>
        <div class="card-footer card-green">
          <a href="javascript:;">
            <span class="pull-xs-left">View Details</span>
            <span class="pull-xs-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </a>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6">
      <div class="card card-yellow card-inverse">
        <div class="card-header card-yellow">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-shopping-cart fa-5x"></i>
            </div>
            <div class="col-xs-9 text-xs-right">
              <div class="huge">124</div>
              <div>New Orders!</div>
            </div>
          </div>
        </div>
        <div class="card-footer card-yellow">
          <a href="javascript:;">
            <span class="pull-xs-left">View Details</span>
            <span class="pull-xs-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </a>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6">
      <div class="card card-red card-inverse">
        <div class="card-header card-red">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-support fa-5x"></i>
            </div>
            <div class="col-xs-9 text-xs-right">
              <div class="huge">13</div>
              <div>Support Tickets!</div>
            </div>
          </div>
        </div>
        <div class="card-footer card-red">
          <a href="javascript:;">
            <span class="pull-xs-left">View Details</span>
            <span class="pull-xs-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->

  </div>
@endsection
