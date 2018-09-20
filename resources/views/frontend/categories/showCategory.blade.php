@extends('frontend/layouts/master')
@section('title', $categoryId->name)
@section('menu', $categoryId->name)
@section('content')
@include('frontend/shared/breadcrumbs')

<!--prdt-starts-->
<div class="prdt show-category">
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
            </div>
        </div>
        <div class="row prdt-top">
            <div class="col-md-3 prdt-right">
                @include('frontend/products/leftsidebarProduct')
            </div>
            <div class="col-md-9 prdt-left">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sky-form sky-frm">
                            <h4>{{ $categoryId->name }}</h4>
                        </div>
                    </div>
                </div>
                <div class="clearfix1"> </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pagination">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="product-one">
                        @if ($products->count() > 0)
                            @foreach ($products as $productId)
                            <div class="col-md-4 product-left p-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="{{ route('productDetail', $productId->slug) }}" class="mask">
                                        <img class="img-responsive zoom-img" src="{{ asset('images/tu01.jpg') }}" alt="" />
                                    </a>
                                    <div class="product-bottom">
                                        <h3><a href="{{ route('productDetail', $productId->slug) }}">{{ $productId->name }}</a></h3>
                                        <p>{{ __('Explore Now') }}</p>
                                        <h4><a class="item_add" href="{{ route('myCart', $productId->slug) }}">
                                            {{ Form::open(['url'=>'/cart', 'class'=>'side-by-side', 'method'=>'post', 'enctype' => 'multipart/form-data']) }}
                                                {{ Form::token() }}
                                                {{ Form::hidden('id', $productId->id) }}
                                                {{ Form::hidden('name', $productId->name) }}
                                                {{ Form::hidden('price', $productId->price) }}
                                                <i>{{ Form::submit('') }}</i>
                                                </a><span class=" item_price">$ {{ $productId->price }}</span>
                                            {{ Form::close() }}
                                        </h4>
                                    </div>
                                    @foreach ($coupons as $coupon)
                                        @if ($productId->id == $coupon->product_id)
                                            @if ($coupon->type == 1)
                                                <div class="srch srch1">
                                                    <span>-{{ $coupon->decrease }}%</span>
                                                    <p>{{ $coupon->code }}</p>
                                                </div>
                                            @else
                                                <div class="srch srch1">
                                                    <span>-${{ $coupon->decrease }}</span>
                                                    <p>{{ $coupon->code }}</p>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                                <div class="clearfix clearfix1"> </div>
                            </div>
                            @endforeach
                        @else
                            <div class="col-md-4">
                                <h4>{{ __('There are no products') }}</h4>
                            </div>
                        @endif
                        </div>
                    </div>
                    <div class="pagination" style="float: right; margin-top: 0">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--product-end-->

@endsection
