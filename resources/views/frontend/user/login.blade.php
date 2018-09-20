@extends('frontend/layouts/master')
@section('title', 'Login')
@section('menu', 'Login')
@section('content')
@include('frontend/shared/breadcrumbs')

<!--account-starts-->
<div class="account" id="account">
    <div class="container">
        <div class="account-top heading">
            <h2>{{ __('LOGIN') }}</h2>
        </div>
        <div class="account-main">
            
            <div class="col-md-12">
                @if (session('fail'))
                <div class="alert alert-info alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('fail') }}
                </div>
                @endif
                
                @if (isset($success))
                    <div class="alert alert-success">
                        {{ $success }}
                    </div>
                @endif
                
                @if (isset($notActived))
                    <div class="alert alert-danger">
                        {{ $notActived }}
                    </div>
                @endif
            </div>
            <div class="col-md-6 account-left">
                <h3>{{ __('Existing User') }}</h3>
                <div class="account-bottom">

                    {{ Form::open(['route'=>'postLogin', 'id'=>'customer_login', 'method'=>'post']) }}

                    <div class="register-main">
                        <div class="loginbox form-horizontal">

                            {{ Form::token() }}

                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">

                                {{ Form::label('inputemail', __('Email *'), ['class' => 'control-label w3-left-align']) }} 
                                {{ Form::email('email', old('email'), ['class' => 'form-control']) }}

                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">

                                {{ Form::label('inputpassword', __('Password *'), ['class' => 'control-label w3-left-align']) }}
                                {{ Form::password('password', ['class' => 'form-control']) }}

                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="address">
                        <a class="forgot" href="{{ route('forgotPassword') }}">{{ __('Forgot Your Password?') }}</a>
                        {{ Form::submit(__('Login')) }}
                    </div>

                    {{ Form::close() }}

                </div>
            </div>
            <div class="col-md-6 account-right account-left">
                <h3>{{ __('New User? Create an Account') }}</h3>
                <div class="account-bottom">
                    <p>{{ __('Infor account') }}</p>
                    <a href="{{ route('register') }}">{{ __('Create an Account') }}</a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--account-end-->

@endsection
