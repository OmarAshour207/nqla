@extends('frontend.layouts.app')

@push('frontend_styles')
    @if(session('locale') == 'ar')
        <link href="{{ asset('frontend/assets/css/auth_rtl.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('frontend/assets/css/auth.css') }}" rel="stylesheet">
    @endif

    <style>
        input[type="file"] {
            display: none;
        }
        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            margin: 30px;
        }
        .image {
            max-width: 220px;
            /*height: 50px;*/
            border-radius: 10px;
            display: block;
        }
    </style>
@endpush

@push('frontend_scripts')
    <script src="{{ asset('dashboard/js/custom/image_preview.js') }}" type="text/javascript"></script>
@endpush

@section('content')
    <main class="main">
        <div class="container login-container">

            @include('frontend.layouts.profile_navbar')

            <section class="wrapper login-content" style="max-width: 75rem;">
                <div class="heading">
                    <h1 class="text text-large">{{ __('User Information') }}</h1>
                    @include('dashboard.partials._errors')
                    @if(session('success'))
                        <div class="alert alert-success">
                            <p class="mb-0">
                                {{ session('success') }}
                            </p>
                        </div>
                    @endif
                </div>

                <form method="post" action="{{ route('user.profile.update') }}" class="form" id="login-form" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6">

                            <img src="{{ auth()->user()->userImage }}" class="image image-preview">

                            <label class="custom-file-upload">
                                <input type="file" name="image" class="image-btn"/>
                                <i class="icofont-upload-alt"></i> {{ __('Change Image') }}
                            </label>

                        </div>

                        <div class="col-lg-6">
                            <div class="input-control">
                                <label for="name" class="input-label" hidden>{{ __('Full Name') }}</label>
                                <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" class="input-field" placeholder="{{ __('Full Name') }}">
                            </div>

                            <div class="input-control">
                                <label for="email" class="input-label" hidden>{{ __('Email Address') }}</label>
                                <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" class="input-field" placeholder="{{ __('Email Address') }}" disabled>
                            </div>

                            <div class="input-control">
                                <label for="phone" class="input-label" hidden>{{ __('Phone Number') }}</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone', auth()->user()->phone) }}" class="input-field" placeholder="{{ __('Phone Number') }}">
                            </div>

                        </div>
                    </div>

                    <div class="input-control">
                        <input type="submit" class="input-submit" value="{{ __('Update') }}">
                    </div>
                </form>
            </section>
        </div>
    </main>
@endsection
