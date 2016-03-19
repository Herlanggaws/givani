@extends('layouts.app')

@section('content')
<section>
    <div id="page-wrapper" class="sign-in-wrapper">
        <div class="graphs">
            <div class="sign-in-form">
                <div class="sign-in-form-top">
                    <p><span>Sign In to</span> <a href="index.html">Admin</a></p>
                </div>
                <div class="signin">
                    <form  method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <!-- <input type="email" class="form-control" name="email" value="{{ old('email') }}"onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address:';}"> -->
                            <div class="log-input">
                                <div class="log-input-left">
                                 <input type="text" class="user"name="email" value="{{ old('email') }}" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address:';}"/>


                                 @if ($errors->has('email'))
                                 <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="log-input">
                            <div class="log-input-left">
                                <input type="password" class="lock" name="password" value="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address:';}"/>
                            </div>
                        </div>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif

                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Login to your account">
                    <div class="form-group">

                        <div class="col-md-6 col-md-offset-4">


                            <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
</sectino>

@endsection
