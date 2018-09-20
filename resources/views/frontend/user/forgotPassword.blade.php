@extends('frontend/layouts/master')
@section('title', 'Forgot Password')
@section('menu', 'Forgot Password')
@section('content')

<!--forgotPassword-starts-->
<div class="forgotPassword">
    <div class="container">
        <div class="account-main">
            <div class="col-md-6 col-md-offset-3">
                <div class="account-top heading">
                    <h2>{{ __('FORGOT PASSWORD') }}</h2>
                </div>
                @if (isset($success))
                    <div class="alert alert-success">
                        {{ $success }}
                    </div>
                @endif
                <div class="account-bottom">
                    {{ Form::open(array('route'=>'postForgotPassword', 'id'=>'customer_forgotpassword', 'method'=>'post')) }}

                    <div class="register-main">
                        <div class="loginbox form-horizontal">

                            {{ Form::token() }}

                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">

                                {{ Form::label('inputemail', __('Your Email *'), array('class' => 'control-label w3-left-align')) }} 
                                {{ Form::email('email', old('email'), array('class' => 'form-control')) }}

                                <span class="text-danger">{{ $errors->first('email') }}</span>
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
<!--forgotpassword-end-->

@endsection
