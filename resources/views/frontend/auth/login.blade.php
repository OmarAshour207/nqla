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
            @if(auth()->check())
                @include('frontend.auth.otp')
            @else
                <section class="wrapper login-content">
                    <div class="heading">
                        <h1 class="text text-large">{{ __('Sign In') }}</h1>
                        <p class="text text-normal">
                            {{ __('New user') }} ?
                            <span>
                            <a href="{{ route('user.register.show') }}" class="text text-links">
                                {{ __('Create an account') }}
                            </a>
                        </span>
                        </p>

                        <div class="alert alert-danger error" style="display: none">
                            <p class="mb-0 error-content">

                            </p>
                        </div>
                    </div>

                    <div id="preloder">
                        <div class="loader"></div>
                    </div>

                    <form name="signin" class="form" id="login-form">
                        <div class="input-control">
                            <label for="email" class="input-label" hidden>{{ __('Email Address') }}</label>
                            <input type="email" name="email" id="email" class="input-field" placeholder="{{ __('Email Address') }}">
                        </div>
                        <div class="input-control">
                            <label for="password" class="input-label" hidden>{{ __('Password') }}</label>
                            <input type="password" name="password" id="password" class="input-field" placeholder="{{ __('Password') }}">
                        </div>
                        <div class="input-control">
                            {{--                        <a href="#" class="text text-links">Forgot Password</a>--}}
                            <input type="submit" name="submit" class="input-submit" value="{{ __('Sign In') }}">
                        </div>
                    </form>
                    <div class="striped">
                        <span class="striped-line"></span>
                        <span class="striped-text">{{ __('Or') }}</span>
                        <span class="striped-line"></span>
                    </div>
                    <div class="method">
                        <div class="method-control">
                            <a href="#" class="method-action">
                                <i class="icofont-brand-google"></i>
                                <span>{{ __('Sign in with Google') }}</span>
                            </a>
                        </div>
                    </div>
                </section>
            @endif
        </div>
    </main>

@endsection

@push('frontend_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#login-form').submit(function (e) {
                e.preventDefault();

                var $inputs = $('#login-form :input');
                var values = {};

                $inputs.each(function() {
                    values[this.name] = $(this).val();
                });

                $.ajax({
                    url: "{{ route('user.login') }}",
                    data_type: 'text',
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        email: values.email,
                        password: values.password
                    }, beforeSend: function () {
                        $('.error').css('display', 'none');
                        $('.input-submit').prop('disabled', true);
                        $('#preloder').fadeIn();
                    }, success: function (data) {
                        $('#preloder').fadeOut();
                        $('.login-content').fadeOut();
                        $('.login-container').html(data);
                    }, error: function(data) {
                        $('.error-content').html(data.responseJSON.error);
                        $('.error').css('display', 'block');
                        $('.input-submit').prop('disabled', false);
                        $('#preloder').fadeOut();
                    }
                });
            });
        });
    </script>
@endpush
