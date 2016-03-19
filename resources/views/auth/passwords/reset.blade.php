@extends('layouts.app')

@section('content')
<section>
 <div id="page-wrapper" class="sign-in-wrapper">
    <div class="graphs">
        <div class="sign-in-form">
            <div class="sign-in-form-top">
                <p><span>Reset Password</span></p>
            </div>
            <div class="signin">
                <form  role="form" method="POST" action="{{ url('/password/reset') }}">
                    {!! csrf_field() !!}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <!-- <input type="email" class="form-control" name="email" value="{{ old('email') }}"onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address:';}"> -->
                        <div class="log-input">
                            <div class="log-input-left">
                                <input type="text" class="user"name="email" placeholder="Email address"/>


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
                                <input type="password" class="lock" name="password" placeholder="Password"/>
                            </div>
                        </div>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif

                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="log-input">
                            <div class="log-input-left">
                                <input type="password" class="lock" name="password_confirmation" placeholder="Confirm Password"/>
                            </div>
                        </div>

                        @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif

                    </div>                    
                    <input type="submit" value="Reset Password">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
