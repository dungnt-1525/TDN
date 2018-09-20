@extends('frontend/layouts/master')
@section('title', 'Register')
@section('menu', 'Register')
@section('content')

<div class="container registersuccess">
    <div class="w3-center">
        <h3 class="w3-center mess_success">{{ __('Congratulations on your successful registration!!') }}</h3>
        <p class="w3-center">{{ __('We have sent the activation code to your mail account. Please check the mail and follow the instructions to activate your account.') }}</p>
        <a href="{{ route('login') }}" class="btn w3-green w3-margin-top">{{ __('CONTINUE TO PURCHASE') }}</a>
    </div>
</div>

@endsection
