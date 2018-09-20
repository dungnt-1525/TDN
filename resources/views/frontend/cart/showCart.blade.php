@extends('frontend/layouts/master')
@section('title', 'My Cart')
@section('menu', 'My Cart')
@section('content')
@include('frontend/shared/breadcrumbs')

<!--start-ckeckout-->
<div class="widget">
    <div class="container">
        <div class="row">
            <div class="ckeck-top heading">
                <h2>{{ __('YOUR CART') }}</h2>
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
            <form method="get" action="{{ route('user.createOrder') }}">
            <div class="col-md-8">
                <div class="ckeckout-top">
                    <div class="cart-items">
                    @if (sizeof(Cart::content()) > 0)

                        <table class="table table-cart w_sidebar">
                            <thead>
                                <tr class="sky-form">
                                    <th class="table-image">{{ __('Image') }}</th>
                                    <th class="cart-name">{{ __('Product') }}</th>
                                    <th class="cart-quantity">{{ __('Quantity') }}</th>
                                    <th class="cart-price">{{ __('Price') }}</th>
                                    <th class="column-spacer"></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $item)

                                <tr>
                                    <td class="table-image">
                                        @foreach ($pas as $pa)
                                            @if ($loop->first)
                                                <a href=""><img src="{{ asset($pa->img_path) }}" alt="product" class="img-responsive cart-image"></a>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('productDetail', $item->slug) }}">{{ $item->name }}</a>
                                        <p>{{ $item->slug }}</p>
                                    </td>
                                    <td class="cart-quantity">
                                        <form action="{{ route('cartUpdate', [$item->rowId]) }}" method="POST" class="side-by-side">
                                            {!! csrf_field() !!}
                                            <ul>
                                                <li><input type="number" min="1" max="100" name="quantity" id="quantity" class="form-control" value="{{ $item->qty }}"></li>
                                                <li><input type="submit" class="btn-update" value="Update"></li>
                                            </ul>
                                        </form>
                                    </td>
                                    <td>${{ $item->price }}</td>
                                    <td>
                                        <form action="{{ url('cart', [$item->rowId]) }}" method="POST" class="side-by-side">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" class="btn btn-danger btn-sm" value="{{ __('Remove') }}">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ url('switchToWishlist', [$item->rowId]) }}" method="POST" class="side-by-side">
                                            {!! csrf_field() !!}
                                            <input type="submit" class="btn btn-success btn-sm" value="{{ __('To Wishlist') }}">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            <a href="{{ route('products') }}" class="btn btn-success btn-md btn-action"><i class="fa fa-angle-left"></i>&nbsp&nbsp {{ __('Continue Shopping') }}</a>

                            <div style="float:right">
                                <form action="{{ url('/emptyCart') }}" method="POST">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" class="btn btn-danger btn-md btn-action" value="{{ __('Empty Cart') }}">
                                </form>
                            </div>
                        </div>
                    @else
                        <h3>{{ __('You have no items in your shopping cart') }}</h3>
                        <a href="{{ route('products') }}" class="btn btn-primary btn-md btn-action"><i class="fa fa-angle-left"></i>&nbsp&nbsp {{ __('Continue Shopping') }}</a>
                    @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4 infor-order">
                <div class="w_sidebar">
                    <section  class="sky-form">
                        <h4>{{ __('Receive information') }}</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <p>{{ __('Address') }}</p>
                                <input type="textarea" name="address" value="{{ $user->address }}" class="form-control">
                                <p>{{ __('Full name') }}</p>
                                <input type="text" name="name" value="{{ $user->first_name . ' ' . $user->last_name }}" class="form-control">
                                <p>{{ __('Phone') }}</p>
                                <input type="number" min="0" name="phone" value="{{ $user->phone }}" class="form-control">
                            </div>
                        </div>
                    </section>
                    <section  class="sky-form">
                        <h4>{{ __('Order Summary') }}</h4>
                        <div class="row">
                            <div class="col-md-7">
                                <p>{{ __('Subtotal') }} {{ Cart::count() }}
                                @if (Cart::count() <= 1) {{ __('item')}} @endif
                                @if (Cart::count() > 1) {{ __('items')}} @endif</p>
                                <p>{{ __('Shipping Fee') }}</p>
                            </div>
                            <div class="col-md-5 right">
                                <p>${{ $subtotalCart = Cart::instance('default')->subtotal() }}</p>
                                <p>{{ __('FREE') }}</p>
                            </div>
                        </div>
                        <div class="row voucher-code">
                            <div class="col-md-12">
                                <form method="get" action="{{ route('checkCoupon') }}">
                                    {!! csrf_field() !!}
                                    <div class="press-code">
                                        <input type="text" name="coupon" id="coupon" class="form-control">
                                    </div>
                                    <div class="apply-code">
                                        <input type="submit" name="{{ __('APPLY') }}" class="btn btn-info">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <p>{{ __('Discount: ') }}</p>
                            </div>
                            <div class="col-md-5 right">
                                <p>
                                @php
                                    $decrease = 0;
                                    $subtotalCart = Cart::subtotal();
                                    $sub = $subtotalCart;
                                @endphp
                                @foreach (Cart::content() as $its)
                                    @foreach ($coupons as $coupon)
                                        @if ($coupon->product_id == $its->id)
                                            @if ($coupon->type == 1)
                                                {{ $decrease = ($its->qty) * ($coupon->price) * ($coupon->decrease)/100 }}
                                            @else
                                                {{ $decrease = ($its->qty) * ($coupon->decrease) }}
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p>{{ __('Total') }}</p>
                                <p></p>
                            </div>
                            <div class="col-md-9 right">
                                <p class="cart-total"><span>$</span><input type="text" name="amount" value="{{ (doubleval(str_replace(',', '', Cart::subtotal()))) - $decrease }}"></p>
                                <p class="vat-include">{{ __('VAT included, where applicable') }}</p>
                            </div>
                        </div>
                    </section>

                </div>
                <section class="proceed-checkout">
                    <input type="submit" name="submit" class="btn btn-warning btn-md btn-action" value="{{ __('Proceed to Checkout') }}">
                </section>
            </div>
            </form>
        </div>
    </div>
</div>
<!--end-ckeckout-->

@endsection
