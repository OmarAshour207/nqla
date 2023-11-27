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
        <div class="container signup-container">
            <section class="wrapper signup-content">
                <div class="heading">
                    <h1 class="text text-large">{{ __('Sign Up') }}</h1>
                    <p class="text text-normal">
                        {{ __('Already have account') }} ?
                        <span>
                        <a href="{{ route('user.login.show') }}" class="text text-links">
                            {{ __('Login') }}
                        </a>
                    </span>
                    </p>

                    <div class="alert alert-danger error" style="display: none"></div>
                </div>

                <div id="preloder">
                    <div class="loader"></div>
                </div>

                <form name="signin" class="form" id="signup-form">
                    <div class="input-control">
                        <label for="name" class="input-label" hidden>{{ __('Full Name') }}*</label>
                        <input type="text" name="name" id="name" class="input-field" placeholder="{{ __('Full Name') }}*">
                    </div>
                    <div class="input-control">
                        <label for="email" class="input-label" hidden>{{ __('Email Address') }}*</label>
                        <input type="email" name="email" id="email" class="input-field" placeholder="{{ __('Email Address') }}*">
                    </div>
                    <div class="input-control">
                        <label for="password" class="input-label" hidden>{{ __('Password') }}*</label>
                        <input type="password" name="password" id="password" class="input-field" placeholder="{{ __('Password') }}*">
                    </div>
                    <div class="input-control">
                        <label for="password_confirmation" class="input-label" hidden>{{ __('Confirm Password') }}*</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="input-field" placeholder="{{ __('Password Confirmation') }}*">
                    </div>
                    <div class="input-control">
                        <label for="phone" class="input-label" hidden>{{ __('Phone Number') }}*</label>
                        <input type="text" name="phone" id="phone" class="input-field" placeholder="{{ __('Phone Number') }}*">
                    </div>
                    <div class="input-control">
                        <input type="submit" name="submit" class="input-submit" value="{{ __('Sign Up') }}">
                    </div>
                </form>
                <div class="striped">
                    <span class="striped-line"></span>
                    <span class="striped-text">{{ __('Or') }}</span>
                    <span class="striped-line"></span>
                </div>
                <div class="method">
                    <div class="method-control">
                        <a href="{{ route('login.google.redirect') }}" class="method-action">
                            <i class="icofont-brand-google"></i>
                            <span>{{ __('Sign up with Google') }}</span>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </main>

@endsection

@push('frontend_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#signup-form').submit(function (e) {
                e.preventDefault();

                var $inputs = $('#signup-form :input');
                var values = {};

                $inputs.each(function() {
                    values[this.name] = $(this).val();
                });

                $.ajax({
                    url: "{{ route('user.register') }}",
                    data_type: 'text',
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: values.name,
                        email: values.email,
                        password: values.password,
                        password_confirmation: values.password_confirmation,
                        phone: values.phone
                    }, beforeSend: function () {
                        $('.error').css('display', 'none');
                        $('.input-submit').prop('disabled', true);
                        $('#preloder').fadeIn();
                    }, success: function (data) {
                        $('#preloder').fadeOut();
                        $('.signup-content').fadeOut();
                        $('.signup-container').html(data);
                    }, error: function(data) {
                        var errors = '';
                        $.each(data.responseJSON.errors, function (key, value) {
                            errors += '<p class="mb-0 error-content">'+
                                value[0] +
                            '</p>'
                        });

                        $('.error').html(errors);
                        $('.error').css('display', 'block');

                        $('.input-submit').prop('disabled', false);
                        $('#preloder').fadeOut();
                    }
                });
            });
        });
    </script>
@endpush
