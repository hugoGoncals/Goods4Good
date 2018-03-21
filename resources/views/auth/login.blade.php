@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row" >
        <div class="middlePage">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <h3 class="panel-title">Sign In</h3>
                </div>
                <div class="panel-body" style="height: 230px;">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="col-md-5"> 
                            <label>You can also sign in using your Facebook, Google or Twitter Account</label>        
                            <a class="btn btn-primary-facebook btn-block spacing" href="{{ URL::route('auth/facebook') }}">
                                Sing in with Facebook
                            </a>
                            <a class="btn btn-primary-google btn-block spacing" href="{{ URL::route('auth/google') }}">
                                Sing in with Google
                            </a>
                            <a class="btn btn-primary-twitter btn-block spacing" href="{{ URL::route('auth/twitter') }}">
                                Sing in with Twitter
                            </a>
                        </div>
                        <div class="col-md-7 " style="border-left:1px solid #ccc;height:200px">
                            <fieldset>
                                <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="control-label">E-Mail Address</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="control-label">Password</label>
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                     <button type="submit" class="btn btn-primary btn-block">
                                        Sign in
                                    </button>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
