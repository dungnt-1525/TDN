@extends('frontend/layouts/master')
@section('title', 'My Profile')
@section('menu', 'My Profile')
@section('content')
@include('frontend/shared/breadcrumbs')

<!--show profile-starts-->
<div class="showProfile" id="showProfile">
    <div class="container">
        {{ Form::open(['route' => ['user.postEditProfile', $user->id], 'method'=>'post', 'enctype' => 'multipart/form-data']) }}
            {{ Form::token() }}
            
            <div class="col-md-3">
                <div class="inforUser-left">
                @if ($user->img_url != '')
                    <img class="user-avatar" src="{{ asset($user->img_url) }}">
                @elseif ($user->img_url == '' and $user->sex == 'male')
                    <img class="user-avatar" src="{{ asset('/images/avatar/avatar-men.jpg') }}">
                @else
                    <img class="user-avatar" src="{{ asset('/images/avatar/avatar-women.jpg') }}">
                @endif
                    {{ Form::file('img_url') }}
                    <ul class="sidebar-profile">
                        <li class="active"><a href="{{ route('user.profile', $user->id) }}">{{ __('Account Manager') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <h3 class="title-page"><b>{{ __('Account Manager') }}</b></h3>
                <div class="row">
                    <div class="col-md-12">
                        @if (session('message_fail'))
                            <div class="alert alert-profile alert-warning" style="text-align: center">{{ session('message_fail')}}</div>
                        @endif
                        @if (session('message'))
                            <div class="alert alert-profile alert-success" style="text-align: center">{{ session('message')}}</div>
                        @endif
                        @if (session('message_info'))
                            <div class="alert alert-profile alert-info" style="text-align: center">{{ session('message_info')}}</div>
                        @endif
                    </div>
                </div>
                <div class="inforUser-left">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="subtitle"><b>{{ __('Personal information') }}</b></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                {{ Form::label('inputlastName', __('Last name *'), ['class' => 'control-label w3-right-align']) }}
                                <div class="">
                                    {{ Form::text('last_name', $user->last_name, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                {{ Form::label('inputfisrtName', __('Fisrt name *'), ['class' => 'control-label w3-right-align']) }}
                                <div class="">
                                    {{ Form::text('first_name', $user->first_name, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                {{ Form::label('inputemail', __('Email *'), ['class' => 'control-label w3-right-align']) }}
                                <div class=" ">
                                    {{ Form::email('email', $user->email, ['class' => 'form-control', 'disabled' => 'disable']) }}
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                            
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                {{ Form::label('inputpassword', __('Password'), ['class' => 'control-label w3-right-align']) }}
                                <div class=" ">
                                    {{ Form::password('password', ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : '' }}">
                                {{ Form::label('inputpassword', __('Confirm Password'), ['class' => 'control-label w3-right-align']) }}
                                <div class=" ">
                                    {{ Form::password('confirm_password', ['class' =>'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 infor-address">
                            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                {{ Form::label('inputphone', __('Phone number *'), ['class' => 'control-label w3-right-align']) }}
                                <div class="">
                                    {{ Form::text('phone', $user->phone, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('inputsex', __('Sex'), ['class' => 'control-label w3-right-align']) }}
                                <div class=" ">
                                    {{ Form::select('sex', ['0' => __('Male'), '1' => __('Female')], $user->sex, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('inputbirthday', __('Birthday'), ['class' => 'control-label w3-right-align']) }}
                                <div class=" ">
                                    {{ Form::date('birthday', $user->birthday, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('inputaddress', __('Address'), ['class' => 'control-label w3-right-align']) }}
                                <div class=" ">
                                    {{ Form::textarea('address', $user->address, ['class' => 'form-control', 'size' => '2x5']) }}
                                </div>
                            </div>                            
                            
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
            <div class="col-md-12 btn-save">
                {{ Form::submit(__('SAVE'), ['class' => 'btn btn-primary']) }}
            </div>
        {{ Form::close() }}
        <div class="clearfix"></div>
    </div>
</div>
<!--show profile-end-->

@endsection
