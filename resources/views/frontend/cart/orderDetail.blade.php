@extends('frontend/layouts/master')
@section('title', 'Order Detail #' . $order->id)
@section('menu', 'Order Detail #' . $order->id)
@section('content')
@include('frontend/shared/breadcrumbs')

<div class="showProfile" id="showProfile">
    <div class="container">
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
                @if ($user->id == $order->user_id)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="item-order">
                                <table class="item-orderTable">
                                    <tr>
                                        <th colspan="3">
                                            <p>{{ __('Order') }} #{{ $order->id }}</p>
                                            <p>{{ __('Place on') }} {{ $order->created_at }}</p>
                                        </th>
                                        <th>
                                            <h4>{{ __('Total: ') }}$ {{ $order->amount }}</h4>
                                        </th>
                                        <th><a href="{{ route('user.cancelOrder', $order->id) }}" class="btn btn-danger">{{ __('Cancel') }}</a></th>
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
                                                <td></td>
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
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection
