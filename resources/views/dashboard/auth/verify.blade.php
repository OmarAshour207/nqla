<!DOCTYPE html>
<html lang="{{ session('locale') }}" dir="{{ session('locale') == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="{{ asset('dashboard/images/logos/logo.jpg') }}">
    <title>{{ __('Verify OTP') }}</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    @if(session('locale') == 'ar')
        <link type="text/css" href="{{ asset('dashboard/css/app.rtl.css') }} " rel="stylesheet">

        <link type="text/css" href="{{ asset('dashboard/css/vendor-material-icons.rtl.css') }}" rel="stylesheet">

        <link type="text/css" href="{{ asset('dashboard/css/vendor-fontawesome-free.rtl.css') }} " rel="stylesheet">
    @else
        <!-- App CSS -->
        <link type="text/css" href="{{ asset('dashboard/css/app.css') }} " rel="stylesheet">
        <!-- Material Design Icons -->
        <link type="text/css" href="{{ asset('dashboard/css/vendor-material-icons.css') }} " rel="stylesheet">
        <!-- Font Awesome FREE Icons -->
        <link type="text/css" href="{{ asset('dashboard/css/vendor-fontawesome-free.css') }} " rel="stylesheet">
    @endif

</head>

<body class="layout-login">

<div class="layout-login__overlay"></div>
<div class="layout-login__form bg-white" data-perfect-scrollbar>
    <div class="d-flex justify-content-center mt-2 mb-5 navbar-light">
        <a href="{{ route('dashboard.index') }}" class="navbar-brand" style="min-width: 0">
            <img class="navbar-brand-icon" src="{{ asset('dashboard/images/logos/logo_2.jpg') }}" width="25" alt="{{ setting('title') }}">
            <span>{{ setting('title') }}</span>
        </a>
    </div>

    <h4 class="m-0">{{ __('Verify OTP') }}</h4>

    <form method="post" action="{{ route('dashboard.verifyotp') }}" novalidate>
        @csrf

        @if (session('error'))
            <div class="alert alert-danger">
                <p class="mb-0"> {{ session('error') }} </p>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                <p class="mb-0"> {{ session('success') }} </p>
            </div>
        @endif


        <div class="form-group">
            <label class="text-label" for="email_2">{{ __('OTP Code') }}:</label>
            <div class="input-group input-group-merge">
                <input id="email_2" name="code" type="text" required="" class="form-control form-control-prepended" placeholder="****">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="fa fa-key"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group text-center">
            <button class="btn btn-primary mb-5" type="submit">{{ __('Verify') }}</button><br>
            <a href="{{ route('dashboard.resendotp') }}">{{ __('Resend Code ?') }}</a>
        </div>
    </form>
</div>


<!-- jQuery -->
<script src="{{ asset('dashboard/vendor/jquery.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('dashboard/vendor/popper.min.js') }}"></script>
<script src="{{ asset('dashboard/vendor/bootstrap.min.js') }}"></script>

<!-- DOM Factory -->
<script src="{{ asset('dashboard/vendor/dom-factory.js') }}"></script>

<!-- MDK -->
<script src="{{ asset('dashboard/vendor/material-design-kit.js') }}"></script>

<!-- App -->
<script src="{{ asset('dashboard/js/app.js') }}"></script>

</body>
</html>
