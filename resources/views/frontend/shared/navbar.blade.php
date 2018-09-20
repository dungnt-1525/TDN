<!--top-header-->
<div class="top-header">
    <div class="container">
        <div class="top-header-main">
            <div class="col-md-6 top-header-left">
                <div class="drop">
                    <div class="box">
                        <select tabindex="4" class="dropdown drop">
                            <option value="" class="label">Dollar :</option>
                            <option value="1">Dollar</option>
                            <option value="2">VND</option>
                        </select>
                    </div>
                    <div class="box1">
                        <select tabindex="4" class="dropdown">
                            <option value="" class="label">English :</option>
                            <option value="1">English</option>
                            <option value="2">VietNam</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6 top-header-left">
                <ul class="top-headercart">
                    <li class="">
                        <ul class="guest-action">
                        @if(!Sentinel::guest())
                            <li class="dropdown dpd-user">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre id='dropdown-menu'> {{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }} <span class="caret"></span></a>

                                <ul class="dropdown-menu">
                                @if(Sentinel::check())
                                    @if(Sentinel::inRole('admin'))
                                        <li><a href="{{ route('admin') }}">{{ __('Admin') }}</a></li>
                                        <li><a href="{{ route('logout') }}">{{ __('Logout') }}</a></li>
                                    @else
                                        @php
                                            $user = Sentinel::getUser();
                                        @endphp
                                        <li><a href="{{ route('user.profile', $user->id) }}">{{ __('Account manager') }}</a></li>
                                        <li><a href="{{ route('user.myOrders') }}">{{ __('My Orders') }}</a></li>
                                        <li><a href="{{ route('logout') }}">{{ __('Logout') }}</a></li>
                                    @endif
                                @endif
                                </ul>
                            </li>
                        @else
                            <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @endif
                        </ul>
                        <ul class="dropdown-menu" role="menu">
                            <!-- Authentication Links -->
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('/wishlist') }}">{{ __('Wishlist') }}({{ Cart::instance('wishlist')->count(false) }})</a>
                    </li>
                    <li class="cart">
                        <a href="{{ route('myCart') }}">
                            <i class="fa fa-cart-plus icon-cart"></i><span class="cart-count">{{ Cart::instance('default')->count(false) }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--top-header-->
<!--start-logo-->
<div class="logo">
    <a href="/"><h1>{{ __('Luxury Furniture') }}</h1></a>

</div>
<!--start-logo-->
<!--bottom-header-->
<div class="header-bottom">
    <div class="container">
        <div class="header">
            <div class="col-md-9 header-left">
                <div class="top-nav">
                    <ul class="memenu skyblue">
                        <li class="active"><a href="/">{{ __('Home') }}</a></li>
                        <li class="grid"><a href="{{ route('products') }}">{{ __('Product Categories') }}</a>
                            <div class="mepanel">
                                <div class="row">
                                    <div class="col1 me-one">
                                        <h4>Noi that phong khach</h4>
                                        <ul>
                                            <li><a href="#"></a></li>
                                            <li><a href="#"></a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>Noi that phong an</h4>
                                        <ul>
                                            <li><a href="#"></a></li>
                                            <li><a href="#"></a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>Noi that phong ngu</h4>
                                        <ul>
                                            <li><a href="#"></a></li>
                                            <li><a href="#"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="grid"><a href="#">{{ __('Promotions') }}</a>
                            <div class="mepanel">
                                <div class="row">
                                    <div class="col1 me-one">
                                        <h4>Voucher</h4>
                                        <ul>
                                            <li><a href="#"></a></li>
                                            <li><a href="#"></a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>Sale</h4>
                                        <ul>
                                            <li><a href="#"></a></li>
                                            <li><a href="#"></a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </li>
                        <li class="grid"><a href="/post">{{ __('Blog') }}</a>
                        </li>
                        <li class="grid"><a href="/contact">{{ __('Contact us') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 header-right">
                <div class="search-bar">
                    <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                    <input type="submit" value="">
                </div>
            </div>
        </div>
    </div>
</div>
<!--bottom-header-->
