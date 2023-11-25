<!DOCTYPE html>
<html lang="{{ session('locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
    <!-- Icofont CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/icofont.min.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
    <!--  Owl Carousel Theme CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.theme.default.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/meanmenu.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">

    @if(session('locale') == 'ar')
        <!-- RTL CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/rtl.css') }}">
    @endif

    <!-- Title CSS -->
    <title>{{ setting('title') }} - {{ __('Home') }}</title>
    <!-- Favicon Link -->
    <link rel="icon" type="image/png" href="{{ asset('frontend/assets/img/favicon.png') }}">

    <link href="{{ asset('dashboard/css/noty.css') }}" rel="stylesheet">
    <script src="{{ asset('dashboard/js/noty.js') }}" type="text/javascript"></script>
    <link href="{{ asset('dashboard/css/sunset.css') }}" rel="stylesheet">

    @stack('frontend_styles')

</head>


<body>

    <!-- PreLoader Start -->
    <div class="loader-content">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="sk-folding-cube">
                    <div class="sk-cube1 sk-cube"></div>
                    <div class="sk-cube2 sk-cube"></div>
                    <div class="sk-cube4 sk-cube"></div>
                    <div class="sk-cube3 sk-cube"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- PreLoader End -->


    {{-- header --}}
    @include('frontend.layouts.header')
    {{--End header--}}

    @include('frontend.partials.session')

    @yield('content')

    @include('frontend.layouts.footer')


<script type="text/javascript">
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

    });

</script>

@stack('frontend_scripts')

</body>
</html>
