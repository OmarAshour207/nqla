<!-- Footer Area Start -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('frontend/assets/img/logo-2.png') }}" alt="logo">
                    </a>
                    <ul>
                        <li>
                            <i class="flaticon-pin"></i>
                            <a href="tel:{{ setting('phonenumber') }}">
                                {{ setting('phonenumber') }}
                            </a>
                        </li>

                        <li>
                            <i class="flaticon-pin"></i>
                            <a href="{{ setting('email') }}">
                                {{ setting('email') }}
                            </a>
                        </li>

                        <li>
                            <i class="flaticon-pin"></i>
                            {{ setting('address') }}
                        </li>
                    </ul>

                    <div class="footer-social">
                        <a href="{{ setting('facebook') }}" target="_blank">
                            <i class="icofont-facebook"></i>
                        </a>
                        <a href="{{ setting('instagram') }}" target="_blank">
                            <i class="icofont-instagram"></i>
                        </a>
                        <a href="{{ setting('twitter') }}" target="_blank">
                            <i class="icofont-twitter"></i>
                        </a>
                        <a href="{{ setting('linkedin') }}" target="_blank">
                            <i class="icofont-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3>Our Services</h3>
                    <ul>
                        <li>
                            <a href="service.html">Air Freight</a>
                        </li>
                        <li>
                            <a href="service.html">Road Freight</a>
                        </li>
                        <li>
                            <a href="ocean-freight.html">Ocean Freight</a>
                        </li>
                        <li>
                            <a href="service.html">Warehousing</a>
                        </li>
                        <li>
                            <a href="service.html">Storage </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3>Our Support</h3>
                    <ul>
                        <li>
                            <a href="privacy.html">Privacy & Policy</a>
                        </li>
                        <li>
                            <a href="faq.html">FAQS</a>
                        </li>
                        <li>
                            <a href="terms.html">Terms & Conditions</a>
                        </li>
                        <li>
                            <a href="contact.html">Contact Us</a>
                        </li>
                        <li>
                            <a href="about.html">About Us</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3>{{ __('Quick Links') }}</h3>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">{{ __('Home') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}">{{ __('About Us') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}"> {{ __('Contact Us') }} </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <p>2023 Nqla. All Rights Reserved by <a href="https://nqla.com/" target="_blank">Omar</a></p>
    </div>

    <div class="lines">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</footer>
<!-- Footer Area End -->

<!-- Back top Button -->
<div class="top-btn">
    <i class="icofont-scroll-bubble-up"></i>
</div>



<!-- Jquery JS -->
<script src="{{ asset('frontend/assets/js/jquery-2.2.4.min.js') }}"></script>
<!-- Popper JS -->
<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<!-- Subscribe From JS -->
<script src="{{ asset('frontend/assets/js/jquery.ajaxchimp.min.js') }}"></script>
<!-- Form Validator JS -->
<script src="{{ asset('frontend/assets/js/form-validator.min.js') }}"></script>
<!-- Contact JS -->
<script src="{{ asset('frontend/assets/js/contact-form-script.js') }}"></script>
<!-- Owl Carousel Slider JS -->
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
<!-- WOW JS -->
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
<!-- Meanmenu JS -->
<script src="{{ asset('frontend/assets/js/meanmenu.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('frontend/assets/js/custom.js') }}"></script>

