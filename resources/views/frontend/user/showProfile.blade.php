@extends('frontend/layouts/master')
@section('title', 'My Profile')
@section('menu', 'My Profile')
@section('content')
@include('frontend/shared/breadcrumbs')

<!--show profile-starts-->
<div class="showProfile" id="showProfile">
    <div class="container">
        <div class="">
            <div class="col-md-3">
                <div class="inforUser-left">
                @if($user->img_url != '')
                    <img class="user-avatar" src="{{ asset($user->img_url) }}">
                @elseif ($user->img_url == '' and $user->sex == 'male')
                    <img class="user-avatar" src="{{ asset('/images/avatar/avatar-men.jpg') }}">
                @else
                    <img class="user-avatar" src="{{ asset('/images/avatar/avatar-women.jpg') }}">
                @endif
                    <ul class="sidebar-profile">
                        <li class="active"><a href="{{ route('user.profile', $user->id) }}">{{ __('Account Manager') }}</a></li>
                        <li><a href="#">{{ __('My orders') }}</a></li>
                        <li><a href="#">{{ __('My comments') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="title-page"><b>{{ __('Account Manager') }}</b></h3>
                    </div>
                    <div class="col-md-6">
                        <h5 class="user-edit"><a href="{{ route('user.editProfile', $user->id) }}">{{ __('Edit') }}</a></h5>
                    </div>
                </div>
                <div class="inforUser-left">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="subtitle"><b>{{ __('Personal information') }}</b></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <p class="title-name"><b>{{ $user->first_name}} {{ $user->last_name}}</b></p>
                            <p><b>Email:</b> {{ $user->email}}</p>
                            <p><b>Phone:</b> {{ $user->phone}}</p>
                        </div>
                        <div class="col-md-7 infor-address">
                            <p><b>Sex:</b>
                            @if ($user->sex == 0) 
                                {{ __('Male') }} 
                            @else 
                                {{ __('Female') }} 
                            @endif</p>
                            <p><b>Birthday:</b> {{ $user->birthday}}</p>
                            <p><b>Address:</b> {{ $user->address}}</p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="inforUser-left">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="subtitle"><b>{{ __('Orders recently') }}</b></h4>
                            <table class="recently-orders">
                                <tr>
                                    <th>{{ __('Order Number') }}</th>
                                    <th>{{ __('Date Order') }}</th>
                                    <th>{{ __('Products') }}</th>
                                    <th>{{ __('Quantity') }}</th>
                                    <th>{{ __('Total') }}</th>
                                    <th>{{ __('Detail') }}</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--show profile-end-->

@endsection
