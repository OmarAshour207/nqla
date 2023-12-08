@extends('frontend.layouts.app')

@section('content')
    <div class="container" style="margin-top:5%;">
        <div class="row">
            <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000; color: #000000; width: 100%">
                <h2 class="text-center">{{ __('We have been received your order') }}</h2>
                <h3 class="text-center">{{ __('Thank you for your payment') }}</h3>

                <p class="text-center">{{ __('Your order') }} # {{ $order->id }}</p>
                <p class="text-center">
                    {{ __('You will receive an order confirmation email with details of your order') }}
                </p>
                <p class="text-center">
                    {{ __('You can track your order using Track number') }}# <span style="font-weight: bold">{{ $order->track_id }}</span>
                </p>
                <center><div class="btn-group" style="margin-top:50px;">
                        <a href="{{ route('user.orders') }}" class="btn btn-lg" style="background-color: #3C0C70; color: #FFF">{{ __('Continue') }}</a>
                    </div></center>
            </div>
        </div>
    </div>
@endsection
