<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>

    <link href="{{ asset('css/template/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />

    <!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
    <!--Custom-Theme-files-->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Luxury Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/template/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('assets/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/Font-Awesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">

    <!-- owl carousel -->

    <link rel="stylesheet" href="{{ asset('assets/owl.carousel/dist/assets/owl.carousel.min.css') }}">

    <script src="{{ asset('assets/owl.carousel/dist/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <!-- end owl carousel -->

    <script src="{{ asset('assets/bootstrap/dist/js/bootstrap.js') }}"></script>
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--start-menu-->
    <script src="{{ asset('js/template/simpleCart.min.js') }}">
    </script>
    <link href="{{ asset('css/template/memenu.css') }}" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="{{ asset('js/template/memenu.js') }}"></script>
    <!--theme-style-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/frontend/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <script>
        $(document).ready(function() {
            $(".memenu").memenu();
        });
    </script>
    <!--dropdown-->
    <script src="{{ asset('js/template/jquery.easydropdown.js') }}"></script>

    <script type="text/javascript">
        $(function() {

            var menu_ul = $('.menu_drop > li > ul'),
                menu_a = $('.menu_drop > li > a');

            menu_ul.hide();

            menu_a.click(function(e) {
                e.preventDefault();
                if (!$(this).hasClass('active')) {
                    menu_a.removeClass('active');
                    menu_ul.filter(':visible').slideUp('normal');
                    $(this).addClass('active').next().stop(true, true).slideDown('normal');
                } else {
                    $(this).removeClass('active');
                    $(this).next().stop(true, true).slideUp('normal');
                }
            });

        });
    </script>
    <!-- Custom -->
    <script src="{{ asset('js/product.js') }}"></script>
</head>

<body>

    @include('frontend/shared.navbar') @yield('content')

    <!--information-starts-->
    <div class="information">
        <div class="container">
            <div class="infor-top">
                <div class="col-md-3 infor-left">
                    <h3>Follow Us</h3>
                    <ul>
                        <li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
                        <li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
                        <li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
                    </ul>
                </div>
                <div class="col-md-3 infor-left">
                    <h3>Information</h3>
                    <ul>
                        <li>
                            <a href="#">
                                <p>Specials</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>New Products</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Our Stores</p>
                            </a>
                        </li>
                        <li>
                            <a href="contact.html">
                                <p>Contact Us</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Top Sellers</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 infor-left">
                    <h3>My Account</h3>
                    <ul>
                        <li>
                            <a href="account.html">
                                <p>My Account</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>My Credit slips</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>My Merchandise returns</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>My Personal info</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>My Addresses</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 infor-left">
                    <h3>Store Information</h3>
                    <h4>The company name,
                        <span>Lorem ipsum dolor,</span>
                        Glasglow Dr 40 Fe 72.</h4>
                    <h5>+955 123 4567</h5>
                    <p><a href="mailto:example@email.com">contact@example.com</a></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--information-end-->
    <!--footer-starts-->
    <div class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="col-md-6 footer-left">
                    <form>
                        <input type="text" value="Enter Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email';}">
                        <input type="submit" value="Subscribe">
                    </form>
                </div>
                <div class="col-md-6 footer-right">
                    <p>© 2015 Luxury Watches. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--footer-end-->

    @section('extra-js')
    <script>
        (function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.quantity').on('change', function() {
                var id = $(this).attr('data-id')
                $.ajax({
                  type: "PATCH",
                  url: '{{ url("/cart") }}' + '/' + id,
                  data: {
                    'quantity': this.value,
                  },
                  success: function(data) {
                    window.location.href = '{{ url('/cart') }}';
                  }
                });

            });

        })();

    </script>
@endsection
</body>
</html>
