@extends('frontend.layouts.app')

@push('frontend_styles')
    @if(session('locale') == 'ar')
        <link href="{{ asset('frontend/assets/css/auth_rtl.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('frontend/assets/css/auth.css') }}" rel="stylesheet">
    @endif
@endpush

@section('content')
    <main class="main">
        <div class="container login-container">

            @include('frontend.layouts.profile_navbar')

            <section class="wrapper login-content" style="max-width: 75rem;">
                <div class="heading">
                    <h1 class="text text-large">{{ __('All orders') }}</h1>
                </div>

                <div id="preloder">
                    <div class="loader"></div>
                </div>

                <div class="row">
                    <div class="col-lg-12">

                    </div>
             </section>
        </div>
    </main>
@endsection

