@extends('frontend/layouts/master')
@section('title', 'My Wishlist')
@section('menu', 'My Wishlist')
@section('content')
@include('frontend/shared/breadcrumbs')

<!--start-ckeckout-->
<div class="widget wishlist">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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

                @if (sizeof(Cart::instance('wishlist')->content()) > 0)
                <table class="table table-cart w_sidebar">
                    <thead>
                        <tr class="sky-form">
                            <th class="table-image">{{ __('Image') }}</th>
                            <th class="cart-name">{{ __('Product') }}</th>
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
                            <td>${{ $item->price }}</td>
                            <td>
                                <form action="{{ url('wishlist', [$item->rowId]) }}" method="POST" class="side-by-side">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" class="btn btn-danger btn-sm" value="{{ __('Remove') }}">
                                </form>
                            </td>
                            <td>
                                <form action="{{ url('switchToCart', [$item->rowId]) }}" method="POST" class="side-by-side">
                                    {!! csrf_field() !!}
                                    <input type="submit" class="btn btn-success btn-sm" value="{{ __('To Cart') }}">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="spacer"></div>

                <a href="/shop" class="btn btn-success btn-md btn-action"><i class="fa fa-angle-left"></i>&nbsp&nbsp {{ __('Contiph Shopping') }}</a> &nbsp;

                <div style="float:right">
                    <form action="{{ url('/emptyWishlist') }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-danger btn-md btn-action" value="{{ __('Empty Wishlist') }}">
                    </form>
                </div>

            @else

                <h3>{{ __('You have no items in your Wishlist') }}</h3>
                <a href="/shop" class="btn btn-primary btn-lg">{{ __('Continue Shopping') }}</a>

            @endif
            </div>
        </div>
    </div>
</div>

@endsection
