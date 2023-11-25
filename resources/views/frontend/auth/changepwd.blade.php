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
            <section class="wrapper login-content">
                <div class="heading">
                    <h1 class="text text-large">{{ __('Change Password') }}</h1>
                    <p class="text text-normal">
                        {{ __('All fields with * is required') }}
                    </p>

                    @include('dashboard.partials._errors')
                    @if(session('error'))
                        <div class="alert alert-danger">
                            <p class="mb-0">
                                {{ session('error') }}
                            </p>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            <p class="mb-0">
                                {{ session('success') }}
                            </p>
                        </div>
                    @endif
                </div>

                <form action="{{ route('user.update.pwd') }}" method="post" class="form" id="login-form">
                    @csrf
                    <div class="input-control">
                        <label for="old_password" class="input-label" hidden>{{ __('Old Password') }}*</label>
                        <input type="password" name="old_password" id="old_password" class="input-field" placeholder="{{ __('Old Password') }}*">
                    </div>

                    <div class="input-control">
                        <label for="new_password" class="input-label" hidden>{{ __('Password') }}*</label>
                        <input type="password" name="password" id="new_password" class="input-field" placeholder="{{ __('New Password') }}*">
                    </div>

                    <div class="input-control">
                        <label for="new_password_confirmation" class="input-label" hidden>{{ __('New Password Confirmation') }}*</label>
                        <input type="password" name="password_confirmation" id="new_password_confirmation" class="input-field" placeholder="{{ __('New Password Confirmation') }}*">
                    </div>

                    <div class="input-control">
                        <input type="submit" class="input-submit" value="{{ __('Change Password') }}">
                    </div>
                </form>
            </section>
        </div>
    </main>
@endsection
