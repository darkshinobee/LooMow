@extends('master')
@section('title', 'Login Page')

@section('content')

<!--login-->
<div class="container">
  <div class="login">

    <div class="col-md-6 col-md-offset-3 login-do">

      <form method="POST" action="{{ url('/login') }}" id="login_form">
        {{ csrf_field() }}
        <div class="login-mail{{ $errors->has('email') ? ' has-error' : '' }}">
          <input type="text" placeholder="Email" required="" id="email" name="email" value="{{ old('email') }}">
          @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
          <i  class="glyphicon glyphicon-envelope"></i>
        </div>

        <div class="login-mail{{ $errors->has('password') ? ' has-error' : '' }}">
          <input type="password" placeholder="Password" required="" name="password" id="password">
          @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
          <i class="glyphicon glyphicon-lock"></i>
        </div>

        <div class="form-group">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="remember"> Remember Me
            </label>
            <a class="btn btn-link pull-right" href="{{ url('/customer/password/reset') }}">
              Forgot Your Password?
            </a>
          </div>
        </div>
        </form>
        <button class="btn btnColor btn-md btn-block btn-rec a_link" form="login_form">Login</button>
        <span class="pull-right" style="margin-top:10px">Don't have an account? <a href="/register">Sign Up</a></span>
    </div>

  </div>

</div><br>

<!--//login-->

{{-- Close --}}

@endsection
