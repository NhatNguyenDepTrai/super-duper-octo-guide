<!-- Start Footer Area -->
<footer class="footer">
    @php
        $settings = DB::table('settings')->get();
    @endphp
    <!-- Footer Top -->
    <div class="fixed-bottom py-3 bg-light mobile_sidebar d-md-none d-block" style="z-index: 998">
        <div class="d-flex justify-content-around items-center fs-1">
            <a href="{{route('cart')}}" class="single-icon fs-1">
                <i class="ti-shopping-cart"></i>
            </a>
            @auth
                <a href="{{ route('user') }}" class="single-icon fs-1">
                    <i class="ti-user"></i>
                </a>
            @else
                <a href="{{ route('login.form') }}" class="single-icon fs-1">
                    <i class="ti-user"></i>
                </a>
            @endauth
            <a href="{{route('wishlist')}}" class="single-icon fs-1"><i class="fa fa-heart-o"></i> </a>
        </div>
    </div>
    <div class="footer-top section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer about">
                        <div class="logo">
                            <a href="/"><img src="@foreach ($settings as $data) {{ $data->logo }} @endforeach"
                                    alt="logo"></a>
                        </div>

                        <p class="text">
                            @foreach ($settings as $data)
                                {{ $data->short_des }}
                            @endforeach
                        </p>
                        <p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">
                                    @foreach ($settings as $data)
                                        {{ $data->phone }}
                                    @endforeach
                                </a></span></p>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer links">
                        <h4>Information</h4>
                        <ul>
                            <li><a href="{{ route('about-us') }}">About Us</a></li>
                            <li><a href="#">Faq</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer links">
                        <h4>Customer Service</h4>
                        <ul>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Money-back</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer social">
                        <h4>Get In Tuch</h4>
                        <!-- Single Widget -->
                        <div class="contact">
                            <ul>
                                <li>
                                    @foreach ($settings as $data)
                                        {{ $data->address }}
                                    @endforeach
                                </li>
                                <li>
                                    @foreach ($settings as $data)
                                        {{ $data->email }}
                                    @endforeach
                                </li>
                                <li>
                                    @foreach ($settings as $data)
                                        {{ $data->phone }}
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <!-- End Single Widget -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Top -->
    <div class="copyright">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="left">
                            <p>Copyright © {{ date('Y') }} <a href="https://github.com/Prajwal100"
                                    target="_blank">Prajwal Rai</a> - All Rights Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="right">
                            <img src="{{ asset('backend/img/payments.png') }}" alt="#">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-block d-md-none">
        <div class="fixed-bottom p-1 bg-light" style="z-index: 998; box-shadow: #3e3e3e29 0px -9px 8px  ">
            <div class="d-flex align-items-center justify-content-between">
                <div>

                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /End Footer Area -->

<!-- Jquery -->
<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-migrate-3.0.0.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
<!-- Popper JS -->
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<!-- Color JS -->
<script src="{{ asset('frontend/js/colors.js') }}"></script>
<!-- Slicknav JS -->
<script src="{{ asset('frontend/js/slicknav.min.js') }}"></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('frontend/js/owl-carousel.js') }}"></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('frontend/js/magnific-popup.js') }}"></script>
<!-- Waypoints JS -->
<script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
<!-- Countdown JS -->
<script src="{{ asset('frontend/js/finalcountdown.min.js') }}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('frontend/js/nicesellect.js') }}"></script>
<!-- Flex Slider JS -->
<script src="{{ asset('frontend/js/flex-slider.js') }}"></script>
<!-- ScrollUp JS -->
<script src="{{ asset('frontend/js/scrollup.js') }}"></script>
<!-- Onepage Nav JS -->
<script src="{{ asset('frontend/js/onepage-nav.min.js') }}"></script>
{{-- Isotope --}}
<script src="{{ asset('frontend/js/isotope/isotope.pkgd.min.js') }}"></script>
<!-- Easing JS -->
<script src="{{ asset('frontend/js/easing.js') }}"></script>

<!-- Active JS -->
<script src="{{ asset('frontend/js/active.js') }}"></script>

<style>
    .mobile_sidebar{
        font-size: 30px
    }
</style>
@stack('scripts')
<!--Start of Tawk.to Script
    -->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/66cf22a9ea492f34bc0b000a/1i6chupsb';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->
<script>
    setTimeout(function() {
        $('.alert').slideUp();
    }, 5000);
    $(function() {
        // ------------------------------------------------------- //
        // Multi Level dropdowns
        // ------------------------------------------------------ //
        $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
            event.preventDefault();
            event.stopPropagation();

            $(this).siblings().toggleClass("show");


            if (!$(this).next().hasClass('show')) {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
            }
            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
                $('.dropdown-submenu .show').removeClass("show");
            });

        });
    });
</script>
