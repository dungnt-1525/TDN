@extends('frontend/layouts/master')
@section('title', 'Chectout')
@section('menu', 'Chectout')
@section('content')
@include('frontend/shared/breadcrumbs')

<div class="widget checkout">
    <div class="container">
        <div class="row">
            <form method="get" action="{{ route('user.createOrder') }}">
                {!! csrf_field() !!}
                <div class="col-md-8">
                    <div class="">
                        <ul class="nav nav-pills nav-justified" id="checkout-address">
                            <li class=""><a href="#checkout-address"><i class="fa fa-map-marker"></i><br>{{ __('Address') }}</a>
                            </li>
                        </ul>

                        <div class="content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{ __('Name *') }}</label>
                                        <input type="text" class="form-control" id="name" value="{{ $user->first_name . ' ' . $user->last_name}}" name="name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{ __('Telephone') }} *</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{ __('Email') }}</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{ __('Address') }} *</label>
                                        <input type="textare" class="form-control" id="address" name="address" value="{{ $user->address }}">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>

                        <!-- Payment method -->
                        <ul class="nav nav-pills nav-justified" id="checkout-paymentmethod">
                            <li><a href="#checkout-paymentmethod"><i class="fa fa-money-bill-alt"></i><br>{{ __('Payment Method') }}</a>
                            </li>
                        </ul>

                        <div class="content content-payment">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><input type="radio" name="cash" checked="checked">&nbsp&nbsp{{ __('Cash on delivery') }}</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><input type="radio" name="cash" class="">&nbsp&nbsp{{ __('Onepay') }}</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><input type="radio" name="cash" class="">&nbsp&nbsp{{ __('Payment Gateway') }}</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="cash">
                                        <p>{{ __('You can pay in cash to our courier when you receive the goods at your doorstep.') }}</p>
                                    </div>
                                    <div id="row visa">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Payment method -->
                    </div>
                </div>
                <div class="col-md-4 infor-order">
                     <div class="w_sidebar">
                        <section  class="sky-form">
                            <h4>{{ __('Order Summary') }}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>{{ __('Subtotal') }} {{ __('item') }}</p>
                                    <p>{{ __('Shipping Fee') }}</p>
                                </div>
                                <div class="col-md-6 right">
                                    <span>$</span><input type="text" name="amount" value="{{ Cart::instance('default')->subtotal() }}" class="cart-total">
                                    {{ __('FREE') }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>{{ __('Discount') }}</p>
                                    <p></p>
                                </div>
                                <div class="col-md-9 right">
                                    <span>$</span><input type="text" name="discount" value="{{ Cart::instance('default')->subtotal() }}" class="cart-total">
                                    {{ __('FREE') }}</p>
                                    <p class="cart-total">${{ Cart::subtotal() }}</p>
                                    <p class="vat-include">{{ __('VAT included, where applicable') }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>{{ __('Total') }}</p>
                                    <p></p>
                                </div>
                                <div class="col-md-9 right">
                                    <span>$</span><input type="text" name="price_sale" value="{{ Cart::instance('default')->subtotal() }}" class="cart-total">
                                    {{ __('FREE') }}</p>
                                    <p class="cart-total">${{ Cart::subtotal() }}</p>
                                    <p class="vat-include">{{ __('VAT included, where applicable') }}</p>
                                </div>
                            </div>
                        </section>
                    </div>
                    <section class="proceed-checkout">
                        <button class="btn btn-warning btn-md btn-action">{{ __('Complete Order') }}&nbsp&nbsp<i class="fa fa-angle-right"></i></button>
                    </section>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
