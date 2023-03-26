<!-- footer_section - start
        ================================================== -->
<footer class="footer_section">
    <div class="footer_widget_area">
        <div class="container">
            <div class="row">
                <div class="col col-lg-4 col-md-6 col-sm-6">
                    <div class="footer_widget footer_about">
                        <div class="brand_logo">
                            <a class="brand_link" href="index.html">
                                <img width="200" src=" {{ asset('backend/logo/'.$setting->pic) }}" alt="logo_not_found">
                            </a>
                        </div>
                        <ul class="social_round ul_li">
                            <li><a target="_blank" href="{{$setting->youtube_link}}"><i class="icofont-youtube-play"></i></a></li>
                            <li><a target="_blank" href="{{$setting->instagram_link}}"><i class="icofont-instagram"></i></a></li>
                            <li><a target="_blank" href="{{$setting->twitter_link}}"><i class="icofont-twitter"></i></a></li>
                            <li><a target="_blank" href="{{$setting->facebook_link}}"><i class="icofont-facebook"></i></a></li>
                            <li><a target="_blank" href="{{$setting->linkedin_link}}"><i class="icofont-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col col-lg-2 col-md-3 col-sm-6">
                    <div class="footer_widget footer_useful_links">
                        <h3 class="footer_widget_title text-uppercase">Quick Links</h3>
                        <ul class="ul_li_block">
                            <li><a href="{{route('web.aboutus')}}">About Us</a></li>
                            <li><a href="{{route('web.contact')}}">Contact Us</a></li>
                            <li><a href="{{route('login')}}">Login</a></li>
                            <li><a href="{{route('register')}}">Sign Up</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col col-lg-2 col-md-3 col-sm-6">
                    <div class="footer_widget footer_useful_links">
                        <h3 class="footer_widget_title text-uppercase">Custom area</h3>
                        <ul class="ul_li_block">
                            <li><a href="{{route('user.account')}}">My Account</a></li>
                            <li><a href="#!">Orders</a></li>
                            <li><a href="#!">Privacy Policy</a></li>
                            <li><a href="{{route('web.cart.index')}}">My Cart</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col col-lg-4 col-md-6 col-sm-6">
                    <div class="footer_widget footer_contact">
                        <h3 class="footer_widget_title text-uppercase">Contact Onfo</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt.
                        </p>
                        <div class="hotline_wrap">
                            <div class="footer_hotline">
                                <div class="item_icon">
                                    <i class="icofont-headphone-alt"></i>
                                </div>
                                <div class="item_content">
                                    <h4 class="item_title">Have any question?</h4>
                                    <span class="hotline_number">{{$setting->company_phone}}</span>
                                </div>
                            </div>
                        </div>
                        <ul class="store_btns_group ul_li">
                            <li><a href="#!"><img src="{{ asset('frontend') }}/images/app_store.png"
                                        alt="app_store"></a></li>
                            <li><a href="#!"><img src="{{ asset('frontend') }}/images/play_store.png"
                                        alt="play_store"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-md-6">
                    <p class="copyright_text">
                        ©<script>document.write(new Date().getFullYear())</script> <a href="#!">KaruKart</a>. All Rights Reserved.
                    </p>
                </div>

                <div class="col col-md-6">
                    <div class="payment_method">
                        <h4>Payment:</h4>
                        <img src="{{ asset('frontend') }}/images/payments_icon.png" alt="image_not_found">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer_section - end
        ================================================== -->
