@extends('master')
@section('title', 'Register Page')

@section('content')

  <div class="container">
    <div class="login">
      {{-- Register --}}
      <div class="col-md-6 col-md-offset-3 login-do">
        <form method="POST" action="{{ url('/register') }}" id="reg_form">
          {{ csrf_field() }}

          <div class="login-mail{{ $errors->has('first_name') ? ' has-error' : '' }}">
            <input type="text" placeholder="First Name" required="" id="first_name" name="first_name" autofocus>
            @if ($errors->has('first_name'))
              <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
              </span>
            @endif
            <i  class="glyphicon glyphicon-user"></i>
          </div>

          <div class="login-mail{{ $errors->has('last_name') ? ' has-error' : '' }}">
            <input type="text" placeholder="Last Name" required="" id="last_name" name="last_name" autofocus>
            @if ($errors->has('last_name'))
              <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
              </span>
            @endif
            <i  class="glyphicon glyphicon-user"></i>
          </div>

          <div class="login-mail{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="text" placeholder="Email" required="" id="email" name="email">
            @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
            <i  class="glyphicon glyphicon-envelope"></i>
          </div>

          <div class="login-mail{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" placeholder="Password" required="" id="password" name="password">
            @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
            <i class="glyphicon glyphicon-lock"></i>
          </div>

          <div class="login-mail{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <input type="password" placeholder="Confirm Password" required="" id="password-confirm" name="password_confirmation">
            @if ($errors->has('password_confirmation'))
              <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
              </span>
            @endif
            <i class="glyphicon glyphicon-lock"></i>
          </div>
        </form>
        <button type="submit" class="btn btnColor btn-md btn-block btn-rec a_link" form="reg_form">Register</button>
        <span class="pull-right" style="margin-top:10px">Already have an account? <a href="/login">Login</a></span>
      </div>

    </div>

  </div><br>

  {{-- Close --}}

@endsection
