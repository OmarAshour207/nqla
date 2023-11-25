@extends('frontend.layouts.app')

@section('content')

    <!-- Page Title Start -->
    <div class="page-title title-bg-7">
        <div class="container">
            <div class="title-text text-center">
                <h2>{{ __('Contact Us') }}</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">{{ __('Home') }}</a>
                    </li>
                    <li>
                        {{ __('Contact Us') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Title End -->
    <!-- Contact Card Section Start -->
    <div class="contact-card-section pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="contact-card">
                        <i class="icofont-phone"></i>
                        <a href="tel:{{ setting('phonenumber') }}">{{ setting('phonenumber') }}</a>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="contact-card">
                        <i class="icofont-ui-message"></i>
                        <a href="mailto:{{ setting('email') }}">{{ setting('email') }}</a>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 offset-lg-0 offset-sm-3">
                    <div class="contact-card">
                        <i class="icofont-location-pin"></i>
                        <ul>
                            <li>{{ setting('address') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Card Section End -->

@endsection
