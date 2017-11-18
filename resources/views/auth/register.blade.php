@extends('layouts.auth')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form class="form-horizontal form-material" method="post" id="loginform" action="{{ route('register') }}">
        {{ csrf_field() }}
      <h3 class="box-title m-b-20">Please fill the form to register</h3>
      <div class="form-group ">
          <div class="col-xs-12">
              <input class="form-control" type="text" required="" name="name" placeholder="Name of school"> </div>
      </div>
      <div class="form-group">
          <div class="col-xs-12">
              <input class="form-control" type="email" required="" name="email" placeholder="Email Address"> </div>
      </div>
      <div class="form-group">
          <div class="col-xs-12">
              <input class="form-control" type="password" name="password" required="" placeholder="Password"> </div>
      </div>
      <div class="form-group">
          <div class="col-xs-12">
              <input class="form-control" type="password" name="password_confirmation" required="" placeholder="Confirm Password"> </div>
      </div>

      <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
              <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Register</button>
          </div>
      </div>
      <div class="form-group m-b-0">
          <div class="col-sm-12 text-center">
              <p>Already have an account? <a href="{{ route('login') }}" class="text-info m-l-5"><b>Sign In</b></a></p>
          </div>
      </div>
  </form>
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
