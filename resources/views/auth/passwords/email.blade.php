@extends('layouts.app')

<!-- Main Content -->
@section('content')
<section>
 <div id="page-wrapper" class="sign-in-wrapper">
    <div class="graphs">
        <div class="sign-in-form">
            <div class="sign-in-form-top">
                <p><span>Reset Password</span></p>
            </div>
            <div class="signin">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                    {!! csrf_field() !!}

                    

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

                    <input type="submit" value="Send Password Reset Link">

                </form>
            </div>
        </div>
    </div>
</div>




</section>
@endsection
