<div class="wrapper">
    <div class="heading">
        <h1 class="text text-large">{{ __('Verify OTP code') }}</h1>
        <p class="text text-normal">
            {{ __('We have sent verify code to your email, please check') }}
        </p>

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
    </div>

    <div id="preloder">
        <div class="loader"></div>
    </div>

    <form method="post" name="verify" class="form" id="otp-form" action="{{ route('frontend.verifyotp') }}">
        @csrf
        <div class="input-control">
            <label for="otp" class="input-label" hidden>{{ __('OTP Code') }}</label>
            <input type="text" name="code" id="otp" class="input-field" placeholder="{{ __('OTP Code') }}">
        </div>

        <div class="input-control">
            <a href="{{ route('frontend.resendotp') }}" class="text text-links">{{ __('Resend Code') }}</a>
            <input type="submit" class="input-submit" value="{{ __('Verify') }}">
        </div>
    </form>
</div>
