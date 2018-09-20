@extends('frontend/layouts/master')
@section('title', 'Locked The Login')
@section('content')

<div class="container">
    <div class="w3-center">
        <h3 class="w3-center">{{ __('You are locked out of login') }}</h3>
        <p class="w3-center">{{ __('Please try again later.') }}</p>
        <a href="/" class="btn w3-green w3-margin-top">{{ __('CONTINUE TO PURCHASE') }}</a>
    </div>
</div>

@endsection
