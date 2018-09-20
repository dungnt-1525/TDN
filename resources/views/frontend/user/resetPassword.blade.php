@extends('frontend/layouts/master')
@section('title', 'Reset Password')
@section('menu', 'Reset Password')
@section('content')

<!--reset Password starts-->
<div class="forgotPassword">
    <div class="container">
        <div class="account-main">
            <div class="col-md-6 col-md-offset-3">
                <div class="account-top heading">
                    <h2>{{ __('RESET PASSWORD') }}</h2>
                </div>
                @if (isset($success))
                    <div class="alert alert-success">
                        {{ $success }}
                    </div>
                @endif
                <div class="account-bottom">
                    {{ Form::open(['id'=>'customer_resetpassword', 'method'=>'post']) }}

                    <div class="register-main">
                        <div class="loginbox form-horizontal">

                            {{ Form::token() }}

                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">

                                {{ Form::label('inputpassword', __('Password *'), ['class' => 'control-label w3-left-align']) }}
                                {{ Form::password('password', array('class' => 'form-control')) }}

                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>
                            <div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : '' }}">

                                {{ Form::label('inputconfirmpassword', __('Confirm Password *'), ['class' => 'control-label w3-left-align']) }}
                                {{ Form::password('confirm_password', array('class' => 'form-control')) }}

                                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="address">
                        {{ Form::submit(__('Send activation code')) }}
                    </div>

                    {{ Form::close() }}

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--reset password end-->

@endsection
