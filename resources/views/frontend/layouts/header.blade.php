<!-- Header Area Start -->
<div class="header-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="header-left">
                    <ul>
                        <li>
                            <a href="mailto:{{ setting('email') }}">
                                <i class="icofont-ui-message"></i>
                                {{ setting('email') }}
                            </a>
                        </li>
                        <li>
                            <a href="https://wa.me/{{ setting('phonenumber') }}">
                                <i class="icofont-whatsapp"></i>
                                {{ setting('phonenumber') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="header-right">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-6 offset-lg-6 col-6 col-sm-4">
                            <div class="dropdown text-right">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ asset('frontend/assets/img/united-states.png') }}" alt="country">
                                    {{ session('locale') }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('change.locale', ['locale' => 'en']) }}">
                                        <img src="{{ asset('frontend/assets/img/united-states.png') }}" alt="country">
                                        {{ __('English') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('change.locale', ['locale' => 'ar']) }}">
                                        <img src="{{ asset('frontend/assets/img/united-kingdom.png') }}" alt="country">
                                        {{ __('Arabic') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('change.locale', ['locale' => 'ur']) }}">
                                        <img src="{{ asset('frontend/assets/img/united-kingdom.png') }}" alt="country">
                                        {{ __('Urdu') }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 text-right col-6 col-sm-4">
                            <ul class="header-social">
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="icofont-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="icofont-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="icofont-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="icofont-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header Area End -->

<!-- Navbar Area Start -->
<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('frontend/assets/img/logo-3.png') }}" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link active">
                                <i class="icofont-home"></i>
                                {{ __('Home') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('about') }}" class="nav-link">
                                <i class="icofont-info-circle"></i>
                                {{ __('About') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link">
                                <i class="icofont-phone"></i>
                                {{ __('Contact Us') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('user.orders.create') }}" class="nav-link">
                                <i class="icofont-plus"></i>
                                {{ __('New Order') }}
                            </a>
                        </li>

                        @if(auth()->check())
                            <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle">
                                    <i class="icofont-user"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="{{ route('user.profile') }}" class="nav-link">{{ __('Profile') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('user.change.pwd') }}" class="nav-link">{{ __('Change Password') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">{{ __('Orders') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('frontend.logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('user.login.show') }}" class="nav-link active">
                                    <i class="icofont-user"></i> {{ __('Login') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.register') }}" class="nav-link">
                                    <i class="icofont-user"></i> {{ __('Register') }}
                                </a>
                            </li>
                        @endif

                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar Area End -->
