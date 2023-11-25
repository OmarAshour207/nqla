@extends('frontend.layouts.app')

@section('content')

    <!-- Page Title Start -->
    <div class="page-title title-bg-7">
        <div class="container">
            <div class="title-text text-center">
                <h2>{{ __('About Us') }}</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">{{ __('Home') }}</a>
                    </li>
                    <li>
                        {{ __('About Us') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Title End -->

    <!-- About Section Start -->
    <section class="about-section about-style-two pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="about-img">
                        <img src="{{ asset('frontend/assets/img/about/2.jpg') }}" alt="about image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>{{ __('About Us') }}</span>
                            <h2>{{ __('We Provide Fast & Safe Service to Our Customers') }}</h2>
                        </div>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">About</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                                <p>Found parents would couldn't said on. End is partiality which uniforms, the fundamental; All luxury. Dissolute small a heavy word small big been time small caught guest movement be will a are where at the front its meet been sleep spineless, were finds pointed secure in a success.</p>

                                <p>Of pros the but so, from ill to that good in the trying everyone. That, feedback there made he was may simple, its yet a own blind you ago hand, were finds pointed secure in a success.
                                </p>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Why Choose Section Start -->
    <section class="why-choose-section choose-style-three">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="why-choose-img">
                    </div>
                </div>

                <div class="col-lg-6 p-0">
                    <div class="why-choose-text">
                        <div class="section-title">
                            <h2>{{ __('Why People Choose Nqla ?') }}</h2>
                            <p>{{ __('A cargo aircraft also known as freight aircraft, freighter, airlifter or cargo jet is a fixed-wing aircraft that is designed or converted for the carriage of cargo rather than passengers.') }}</p>
                        </div>

                        <div class="accordions">
                            <div class="accordion-item">
                                <div class="accordion-title" data-tab="item1">
                                    <i class="icofont-fast-delivery"></i>
                                    <h2>{{ __('Fast & Safe Delivery') }} <i class="icofont-stylish-right down-arrow"></i></h2>
                                </div>
                                <div class="accordion-content" id="item1">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.</p>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <div class="accordion-title" data-tab="item2">
                                    <i class="icofont-ssl-security"></i>
                                    <h2>{{ __('Product Security') }} <i class="icofont-stylish-right down-arrow"></i></h2>
                                </div>
                                <div class="accordion-content" id="item2">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.</p>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <div class="accordion-title" data-tab="item3">
                                    <i class="icofont-diamond"></i>
                                    <h2>{{ __('Price Oriented') }} <i class="icofont-stylish-right down-arrow"></i></h2>
                                </div>
                                <div class="accordion-content" id="item3">
                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.</p>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <div class="accordion-title" data-tab="item4">
                                    <i class="icofont-ui-browser"></i>
                                    <h2>{{ __('Secured Payment') }} <i class="icofont-stylish-right down-arrow"></i></h2>
                                </div>
                                <div class="accordion-content" id="item4">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.</p>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <div class="accordion-title" data-tab="item5">
                                    <i class="icofont-live-support"></i>
                                    <h2>{{ __('24/7 Support') }} <i class="icofont-stylish-right down-arrow"></i></h2>
                                </div>
                                <div class="accordion-content" id="item5">
                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.
                                    </p>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <div class="accordion-title" data-tab="item6">
                                    <i class="icofont-like"></i>
                                    <h2>{{ __('Well Experienced') }} <i class="icofont-stylish-right down-arrow"></i></h2>
                                </div>
                                <div class="accordion-content" id="item6">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Choose Section End -->


@endsection
