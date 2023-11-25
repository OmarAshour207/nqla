@extends('frontend.layouts.app')

@section('content')
    <!-- Banner Section Start -->
    <div class="banner-slider owl-carousel owl-theme">
        <div class="banner-item banner-bg-one">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="banner-text">
                            <h1>A Choose & Safe Quality Transport Logistic</h1>
                            <p>Operations deal with the way the vehicles are operated, and the procedures set for this purpose, including financing, legalities, and policies. In the transport industry, operations and ownership of infrastructure can be either public.</p>

                            <div class="banner-btn">
                                <a href="{{ route('user.orders.create') }}" class="default-btn">{{ __('Make an order') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="banner-item banner-bg-two">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="banner-text">
                            <h1>We Provide High-quality Transport Service</h1>
                            <p>Operations deal with the way the vehicles are operated, and the procedures set for this purpose, including financing, legalities, and policies. In the transport industry, operations and ownership of infrastructure can be either public.</p>

                            <div class="banner-btn">
                                <a href="{{ route('user.orders.create') }}" class="default-btn">
                                    {{ __('Make an order') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Features Section Start -->
    <div class="features-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="1s">
                    <div class="feature-card">
                        <i class="icofont-fast-delivery"></i>
                        <span>87,357 KM</span>
                        <h3>Total Delivered</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="1s">
                    <div class="feature-card">
                        <i class="icofont-location-pin"></i>
                        <span>120</span>
                        <h3>Countries Delivered</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="1s">
                    <div class="feature-card">
                        <i class="icofont-users-alt-3"></i>
                        <span>3.2K</span>
                        <h3>Customers Served</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="1s">
                    <div class="feature-card">
                        <i class="icofont-thumbs-up"></i>
                        <span>27</span>
                        <h3>Years Experience</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features Section End -->

    <!-- Track Product Section Start -->
    <div class="track-product track-product-bg pt-100">
        <div class="container">
            <div class="track-text text-center">
                <h2>Keep Tracking Your Product Location</h2>
                <form class="newsletter-form" data-toggle="validator">
                    <input type="email" class="form-control" placeholder="Enter Track ID" name="EMAIL" required autocomplete="off">

                    <button class="default-btn electronics-btn" type="submit">
                        Track Now
                    </button>
                </form>
            </div>
        </div>

        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>
    <!-- Track Product Section End -->

    <!-- Why Choose Section Start -->
    <div class="choose-style-two pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>We are Top Rated Transport Logistic</h2>
                <p>Found parents would couldn't said on. That, feedback there made he was may blind you simple, its yet a own blind you ago hand.</p>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12 col-sm-4 wow fadeInUp" data-wow-duration="1s">
                            <div class="choose-card">
                                <i class="icofont-fast-delivery"></i>
                                <h3>Fast & Safe Delivery</h3>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <div class="choose-card">
                                <i class="icofont-ssl-security"></i>
                                <h3>Product Security</h3>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                            <div class="choose-card">
                                <i class="icofont-diamond"></i>
                                <h3>Price Oriented </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInUp">
                    <div class="why-choose-image">
                        <img src="{{ asset('frontend/assets/img/why-choose/choose-img.png') }}" alt="why Choose image">
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12 col-sm-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                            <div class="choose-card">
                                <i class="icofont-ui-browser"></i>
                                <h3>Secured Payment</h3>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
                            <div class="choose-card">
                                <i class="icofont-live-support"></i>
                                <h3>24/7 Support</h3>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">
                            <div class="choose-card">
                                <i class="icofont-like"></i>
                                <h3>Well Experienced</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Why Choose Section End -->

    <!-- Facilities Section Start -->
    <section class="facilities-section pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="facilities-text">
                        <h2>We Have More Facilities For You</h2>
                        <p>Found parents would couldn't said on. That, feedback there made he was may blind you simple, its yet a own blind you ago hand. Found parents would
                            couldn't said on. That, feedback there made he was simple.</p>

                        <ul>
                            <li>
                                <i class="icofont-check"></i>
                                Get membership card.
                            </li>
                            <li>
                                <i class="icofont-check"></i>
                                15% off on your first delivery.
                            </li>
                            <li>
                                <i class="icofont-check"></i>
                                Yearly most valuable customer award.
                            </li>
                            <li>
                                <i class="icofont-check"></i>
                                You will be premium member after 5 delivery done.
                            </li>
                        </ul>

                        <div class="theme-btn">
                            <a href="#" class="default-btn">Get Free Quote</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="facilities-img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Facilities Section End -->

    <!-- Company Section Start -->
    <div class="company-section company-style-two">
        <div class="container">
            <div class="section-title text-center">
                <h2>Our Choose Regular Customers</h2>
                <p>Found parents would couldn't said on. That, feedback there made he was may blind you simple, its yet a own blind you ago hand.</p>
            </div>

            <div class="company-slider owl-carousel owl-theme">
                <div class="company-logo">
                    <a href="#"><img src="{{ asset('frontend/assets/img/company/1.png') }}" alt="logo"></a>
                </div>
                <div class="company-logo">
                    <a href="#"><img src="{{ asset('frontend/assets/img/company/2.png') }}" alt="logo"></a>
                </div>
                <div class="company-logo">
                    <a href="#"><img src="{{ asset('frontend/assets/img/company/3.png') }}" alt="logo"></a>
                </div>
                <div class="company-logo">
                    <a href="#"><img src="{{ asset('frontend/assets/img/company/4.png') }}" alt="logo"></a>
                </div>
                <div class="company-logo">
                    <a href="#"><img src="{{ asset('frontend/assets/img/company/5.png') }}" alt="logo"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Company Section End -->

    <!-- Feedback Section Strat -->
    <section class="feedback-section feedback-style-two feedback-bg pt-100">
        <div class="container">
            <div class="section-title text-center">
                <span>Feedbacks</span>
                <h2>Feedback From Our Clients</h2>
                <p>Found parents would couldn't said on. That, feedback there made he was may blind you simple, its yet a own blind you ago hand.</p>
            </div>

            <div class="feedback-slider owl-carousel owl-theme">
                <div class="feedback-items">
                    <i class="icofont-quote-right"></i>
                    <p>Thank you for all your help. Your service was exce
                        lent and very fast. Many thanks for you kind
                        efficient service. I have already and will be
                        continue to recommend your services.</p>

                    <img src="{{ asset('frontend/assets/img/feedback/client-1.png') }}" alt="client image">
                    <h3>Joe Johnson</h3>
                    <span>Businessman</span>
                </div>

                <div class="feedback-items">
                    <i class="icofont-quote-right"></i>
                    <p>Thank you for all your help. Your service was exce
                        lent and very fast. Many thanks for you kind
                        efficient service. I have already and will be
                        continue to recommend your services.</p>

                    <img src="{{ asset('frontend/assets/img/feedback/client-2.png') }}" alt="client image">
                    <h3>Mr. McMachman</h3>
                    <span>Businessman</span>
                </div>

                <div class="feedback-items">
                    <i class="icofont-quote-right"></i>
                    <p>Thank you for all your help. Your service was exce
                        lent and very fast. Many thanks for you kind
                        efficient service. I have already and will be
                        continue to recommend your services.</p>

                    <img src="{{ asset('frontend/assets/img/feedback/client-3.png') }}" alt="client image">
                    <h3>John Doe</h3>
                    <span>Businessman</span>
                </div>
            </div>
        </div>
    </section>
    <!-- Feedback Section End -->

    <!-- Contact Section Start -->
    <section class="contact-section pt-100 pb-100">
        <div class="container">
            <div class="section-title text-center">
                <h2>Get intouch</h2>
                <p>Found parents would couldn't said on. That, feedback there made he was may blind you simple, its yet a own blind you ago hand.</p>
            </div>

            <div class="row">
                <div class="col-lg-7">
                    <div class="contact-img">
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="contact-area">
                        <form id="contactForm">
                            <h2>Lets Talk!</h2>
                            <div class="row">
                                <div class="col-lg-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Your Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Your Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="number" name="number" id="number" class="form-control" required data-error="Please enter your number" placeholder="Phone Number">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="subject" id="subject" class="form-control" required data-error="Please enter your subject" placeholder="Your Subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="message-field" id="message" cols="30" rows="5" required data-error="Please type your message" placeholder="Write Message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn contact-btn">
                                        Send Message
                                    </button>
                                    <div id="msgSubmit" class="h3 alert-text text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

@endsection

@push('admin_scripts')
    <script>
        $(".date_from").flatpickr({
            locale: "{{ session()->get('locale') }}",
            defaultDate: '{{ request()->get('from') }}'
        });

        $(".date_to").flatpickr({
            locale: "{{ session()->get('locale') }}",
            defaultDate: '{{ request()->get('to') }}'
        });
    </script>
@endpush
