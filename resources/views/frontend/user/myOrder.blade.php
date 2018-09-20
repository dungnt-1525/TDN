@extends('frontend/layouts/master')
@section('title', 'My Orders')
@section('menu', 'My Orders')
@section('content')
@include('frontend/shared/breadcrumbs')

<div class="showProfile" id="showProfile">
    <div class="container">
        <div class="row">
            <div class="ckeck-top heading">
                <h2>{{ __('MY ORDERS') }}</h2>
                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif

                @if (session()->has('error_message'))
                    <div class="alert alert-danger">
                        {{ session()->get('error_message') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="inforUser-left">
                    <ul class="sidebar-profile">
                        <li><a href="{{ route('user.profile', $user->id) }}">{{ __('Account Manager') }}</a></li>
                        <li class="active"><a href="{{ route('user.myOrders') }}">{{ __('My orders') }}</a></li>
                        <li><a href="#">{{ __('My comments') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                @foreach ($orders as $order)
                    @if ($user->id == $order->user_id)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="item-order">
                                    <table class="item-orderTable">
                                        <tr>
                                            <th colspan="4">
                                                <p>{{ __('Order') }} #{{ $order->id }}</p>
                                                <p>{{ __('Place on') }} {{ $order->created_at }}</p>
                                            </th>
                                            <th>
                                                <a href="{{ route('user.orderDetail', $order->id) }}">{{ __('Manager') }}</a>
                                            </th>
                                        </tr>
                                        @foreach ($ps as $p)
                                            @if ($p->order_id == $order->id)
                                                <tr>
                                                    <td>
                                                    @php $n = 0 @endphp
                                                        @foreach ($imgs as $img)
                                                            @if ($p->product_id == $img->product_id)
                                                                @php $n++ @endphp
                                                                @if ($n == 1)
                                                                    <img src="{{ asset($img->img_path) }}">
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $p->name }}</td>
                                                    <td>{{ __('Qty') }}: {{ $p->quantity}}</td>
                                                    <td>
                                                    @php
                                                        $status = $p->status;
                                                        if ($status == 1) {
                                                            echo __('Pending');
                                                        } elseif ($status == 2) {
                                                            echo __('Shipping');
                                                        } elseif ($status == 3) {
                                                            echo __('Success');
                                                        } elseif ($status == 0) {
                                                            echo __('Cancel');
                                                        } else {
                                                            echo '';
                                                        }
                                                    @endphp
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection
