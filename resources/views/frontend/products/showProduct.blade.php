@extends('frontend/layouts/master')
@section('title', $product->name)
@section('menu', $product->name)
@section('content')
@include('frontend/shared/breadcrumbs')
<!--start-single-->
<div class="container">
    <div class="row single-main">
        <div class="col-md-9 single-main-left">
        <div class="row sngl-top">
            <div class="col-md-5 single-top-left">
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($pas as $pa)
                        <li class="" data-thumb="{{ asset($pa->img_path) }}">
                            <div class="thumb-image"> <img src="{{ asset($pa->img_path) }}" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- FlexSlider -->
                <script src="{{ asset('js/template/imagezoom.js') }}"></script>
                <script defer src="{{ asset('js/template/jquery.flexslider.js') }}"></script>
                <link rel="stylesheet" href="{{ asset('css/template/flexslider.css') }}" type="text/css" media="screen" />

                <script>
                // Can also be used with $(document).ready()
                $(window).load(function() {
                  $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                  });
                });
                </script>
            </div>
            <div class="col-md-7 single-top-right">
                <div class="single-para simpleCart_shelfItem">
                <h2>{{ $product->name }}</h2>
                    <div class="star-on">
                        <ul class="star-footer">
                            <li><a href="#"><i> </i></a></li>
                            <li><a href="#"><i> </i></a></li>
                            <li><a href="#"><i> </i></a></li>
                            <li><a href="#"><i> </i></a></li>
                            <li><a href="#"><i> </i></a></li>
                        </ul>
                        <div class="review">
                            <a href="#"> 1 {{ __('customer review') }} </a>
                        </div>
                    <div class="clearfix"> </div>
                    </div>
                    <h5 class="item_price">$ {{ $product->price }}</h5>
                    <p>{{ $product->description }}</p>
                    <div class="available">
                        <ul>
                            <li>{{ __('Color') }}
                                <select>
                                    @foreach ($paColors as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                            </li>
                        <div class="clearfix"> </div>
                    </ul>
                </div>
                    <ul class="tag-men">
                        <li><span>{{ __('TAG') }}</span>
                        <span class="women1">: {{ __('Women') }},</span></li>
                        <li><span>{{ __('SKU') }}</span>
                        <span class="women1">: {{ $product->barcode }}</span></li>
                    </ul>
                    <ul class="add-cart-wish">
                        <li>
                            {{ Form::open(['url'=>'/cart', 'class'=>'side-by-side', 'method'=>'post', 'enctype' => 'multipart/form-data']) }}
                                {{ Form::token() }}
                                {{ Form::hidden('id', $product->id) }}
                                {{ Form::hidden('name', $product->name) }}
                                {{ Form::hidden('price', $product->price) }}
                                {{ Form::submit(__('ADD TO CART'), ['class'=>'add-cart']) }}
                            {{ Form::close() }}
                        </li>
                        <li>
                            {{ Form::open(['url'=>'/wishlist', 'class'=>'side-by-side', 'method'=>'post', 'enctype' => 'multipart/form-data']) }}
                                {{ Form::token() }}
                                {{ Form::hidden('id', $product->id) }}
                                {{ Form::hidden('name', $product->name) }}
                                {{ Form::hidden('price', $product->price) }}
                                {{ Form::submit(__('ADD TO WISHLIST'), ['class'=>'add-cart btn-primary add-wishlist']) }}
                            {{ Form::close() }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
        <div class="col-md-3 single-right">
            @include('frontend/products/leftsidebarProduct')
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>{{ __('You may also like...') }}</h3>
            <div class="row product-one">
                @foreach ($interested as $product)
                <div class="col-md-3 product-left p-left">
                    <div class="product-main simpleCart_shelfItem">
                        <a href="{{ url('/cart', $product->slug) }}" class="mask"><img class="img-responsive zoom-img" src="{{ asset('images/phong-khach-01.jpg') }}" alt="" /></a>
                        <div class="product-bottom">
                            <h3>{{ $product->name }}</h3>
                            <h4><a class="item_add" href="{{ route('myCart', $product->slug) }}">
                            {{ Form::open(['url'=>'/cart', 'class'=>'side-by-side', 'method'=>'post', 'enctype' => 'multipart/form-data']) }}
                                {{ Form::token() }}
                                {{ Form::hidden('id', $product->id) }}
                                {{ Form::hidden('name', $product->name) }}
                                {{ Form::hidden('price', $product->price) }}
                                <i>
                                    {{ Form::submit('') }}
                                </i>
                            {{ Form::close() }}
                            </a><span class=" item_price">$ {{ $product->price }}</span></h4>
                        </div>
                        <div class="srch">
                            <span>-50%</span>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
        </div>
    </div> <!-- end row -->
</div>
<!--end-single-->

@endsection
