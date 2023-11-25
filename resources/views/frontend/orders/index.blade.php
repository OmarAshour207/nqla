@extends('frontend.layouts.app')

@push('frontend_styles')
    @if(session('locale') == 'ar')
        <link href="{{ asset('frontend/assets/css/auth_rtl.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('frontend/assets/css/auth.css') }}" rel="stylesheet">
    @endif

    <style>
        .icofont-close-circled {
            font-size: 28px;
            color: #ff0000;
            padding: 0 5px 0 10px;
        }
        .icofont-close-circled:hover {
            opacity: 0.5;
        }

        #estimate {
            width: 30%;
            position: relative;
            background-color: #3C0C70;
            color: white;
            padding: 11px 6px;
            float: left;
            text-align: center;
            margin: 11px;
            border-radius: 10px;
            min-width: 300px;
        }

        @media only screen and (max-width: 765px) {

            #estimate div div:last-child {
                margin-bottom: 90px !important;
            }

            #estimate {
                margin: 0px 0px 11px 0px;
            }

            h2 {
                margin-bottom: 30px !important;
            }

            label {
                margin-bottom: 6px !important;
            }
        }

        #estimate div div {
            margin-bottom: 11px;
        }

        #estimate div div:last-child {
            margin-bottom: 0px;
        }

        .total {
            margin-bottom: 6em;
        }

        .custom-model-main {
            text-align: center;
            overflow: hidden;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0; /* z-index: 1050; */
            -webkit-overflow-scrolling: touch;
            outline: 0;
            opacity: 0;
            -webkit-transition: opacity 0.15s linear, z-index 0.15;
            -o-transition: opacity 0.15s linear, z-index 0.15;
            transition: opacity 0.15s linear, z-index 0.15;
            z-index: -1;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .model-open {
            z-index: 99999;
            opacity: 1;
            overflow: hidden;
        }
        .custom-model-inner {
            -webkit-transform: translate(0, -25%);
            -ms-transform: translate(0, -25%);
            transform: translate(0, -25%);
            -webkit-transition: -webkit-transform 0.3s ease-out;
            -o-transition: -o-transform 0.3s ease-out;
            transition: -webkit-transform 0.3s ease-out;
            -o-transition: transform 0.3s ease-out;
            transition: transform 0.3s ease-out;
            transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
            display: inline-block;
            vertical-align: middle;
            width: 80%;
            margin: 30px auto;
            max-width: 97%;
        }
        .custom-model-wrap {
            display: block;
            width: 100%;
            position: relative;
            background-color: #fff;
            border: 1px solid #999;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 6px;
            -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
            box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
            background-clip: padding-box;
            outline: 0;
            text-align: left;
            padding: 20px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            max-height: calc(100vh - 70px);
            overflow-y: auto;
        }
        .model-open .custom-model-inner {
            -webkit-transform: translate(0, 0);
            -ms-transform: translate(0, 0);
            transform: translate(0, 0);
            position: relative;
            z-index: 999;
        }
        .model-open .bg-overlay {
            background: rgba(0, 0, 0, 0.6);
            z-index: 99;
        }
        .bg-overlay {
            background: rgba(0, 0, 0, 0);
            height: 100vh;
            width: 100%;
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 0;
            -webkit-transition: background 0.15s linear;
            -o-transition: background 0.15s linear;
            transition: background 0.15s linear;
        }
        .close-btn {
            position: absolute;
            right: 0;
            top: -50px;
            cursor: pointer;
            z-index: 99;
            font-size: 30px;
            color: #fff;
        }

        @media screen and (min-width:800px){
            .custom-model-main:before {
                content: "";
                display: inline-block;
                height: auto;
                vertical-align: middle;
                margin-right: -0px;
                height: 100%;
            }
        }
        @media screen and (max-width:799px){
            .custom-model-inner{margin-top: 45px;}
        }

        .show-map-btn {
            background-color: #3C0C70;
            color: #fff;
            width: 25%;
            height: 52px;
            border-radius: 2rem;
            margin-left: 10px;
        }
        .show-map-btn:hover {
            opacity: 0.5;
        }

    </style>
@endpush

@push('frontend_scripts')
{{--    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>--}}
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqi1A46RnRhZMsbvpIV9puWHrzWegCSSk&callback=initMap&v=weekly&libraries=places"
        defer>
    </script>

    <script type="text/javascript">

        var marker;
        let that;

        function initMap() {
            const myLatlng = { lat: 30.126865695346638, lng: 31.327831690212832 };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 17,
                center: myLatlng
            });

            // Create the initial InfoWindow.
            let infoWindow = new google.maps.InfoWindow({
                content: "Click the map to get the address!",
                position: myLatlng,
            });

            placeMarker(myLatlng, map);

            let geocoder = new google.maps.Geocoder();

            infoWindow.open(map);
            // Configure the click listener.
            map.addListener("click", (event) => {
                // Close the current InfoWindow.
                infoWindow.close();
                // Create a new InfoWindow.
                infoWindow = new google.maps.InfoWindow({
                    position: event.latLng,
                });

                geocoder.geocode({
                    'latLng': event.latLng
                }, function(results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            infoWindow.setContent(
                                JSON.stringify(results[0].formatted_address),
                            );
                            $('#searchInput').val(JSON.stringify(results[0].formatted_address).replace('/"/g', ''));

                            that.closest('.input-control').find('.address').val(JSON.stringify(results[0].formatted_address).replace('/"/g', ''))
                            that.closest('.input-control').find('.lat').val(JSON.stringify(event.latLng.toJSON().lat));
                            that.closest('.input-control').find('.lng').val(JSON.stringify(event.latLng.toJSON().lng));

                            console.log("Address . " + JSON.stringify(results[0].formatted_address.replace('/"/g', '')));
                            console.log("Lat and lng . " + JSON.stringify(event.latLng.toJSON(), null, 2));

                            infoWindow.open(map);
                        }
                    }
                });

                placeMarker(event.latLng, map);
            });

        /*
        Autocomplete when search in google maps

            const input = document.getElementById("searchInput");
            const options = {
                componentRestrictions: { country: ["EG", "KSA"] },
                fields: ["address_components", "geometry", "icon", "name"],
                strictBounds: false,
            };
            const autocomplete = new google.maps.places.Autocomplete(input, options);

            // Listen for the place selection event
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                console.log('Selected place:', place);
            });
        */
        }

        function placeMarker(position, map)
        {
            if(typeof marker != 'undefined')
                marker.setMap(null);
            // Create a new marker at the clicked location with a red icon
            marker = new google.maps.Marker({
                position: position,
                map,
                icon: {
                    url: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
                }
            });

            map.panTo(position);
        }

        window.initMap = initMap;

        $(document).ready(function() {
            $('.add-station').on('click', function () {
                $('.end-station').before(
                    '<div class="row">'+
                        '<div class="input-control">'+
                            '<label for="address" class="input-label" hidden>'+
                                "{{ __('Address') }}" +
                            '</label>'+
                            '<input type="text" name="address[]" value="" class="input-field address" placeholder="{{ __('Stop Station Address') }}">'+
                            '<input type="hidden" name="lat[]" class="lat" value="">'+
                            '<input type="hidden" name="lng[]" class="lng" value="">'+
                            '<label class="input-label remove-station"> <i class="icofont-close-circled"></i> </label>'+
                                '<button class="show-map-btn show-map">'+
                                    '<i class="icofont-google-map"></i>'+
                                    '{{ __("Show Map") }}'+
                                '</button>'+
                        '</div>'+
                    '</div>');
            });

            $('#order-form').on('click', '.remove-station', function () {
                $(this).closest('.row').remove();
            });

            $(document).on('click', '.show-map', function(e) {
                e.preventDefault();
                that = $(this);
                $(".custom-model-main").addClass('model-open');
            });

            $(".close-btn, .bg-overlay").click(function(){
                $(".custom-model-main").removeClass('model-open');
            });

        });

    </script>
@endpush
@section('content')
    <main class="main">
        <div class="container login-container">

            @include('frontend.layouts.profile_navbar')

            <section class="wrapper login-content" style="max-width: 75rem;">
                <div class="heading">
                    <h1 class="text text-large">{{ __('Make an order') }}</h1>
                </div>

                <div id="preloder">
                    <div class="loader"></div>
                </div>

                <div class="row">
                    <div class="col-lg-7">
                        <form method="post" action="" class="form" id="order-form">
                            @include('dashboard.partials._errors')

                            <div class="custom-model-main">
                                <div class="custom-model-inner">
                                    <div class="close-btn">×</div>
                                    <div class="custom-model-wrap">
                                        <div class="pop-up-content-wrap">
                                            <div class="input-control">
                                                <input type="text" id="searchInput" value="" class="input-field" placeholder="{{ __('Search') }}">
                                            </div>
                                            <div id="map" style="width: 100%; height: 500px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-overlay"></div>
                            </div>

                            <div class="row start-station">
                                <div class="input-control">
                                    <label class="input-label" hidden>{{ __('Address') }}</label>
                                    <input type="text" name="address[]" value="" class="input-field address" placeholder="{{ __('Full Address Start') }}">
                                    <input type="hidden" name="lat[]" class="lat" value="">
                                    <input type="hidden" name="lng[]" class="lng" value="">
                                    <button class="show-map-btn show-map">
                                        <i class="icofont-google-map"></i>
                                        {{ __('Show Map') }}
                                    </button>
                                </div>
                            </div>

                            <div class="row end-station">
                                <div class="input-control">
                                    <label for="address" class="input-label" hidden>{{ __('Address') }}</label>
                                    <input type="text" name="address[]" value="" class="input-field address" placeholder="{{ __('Full Address Start') }}">
                                    <input type="hidden" name="lat[]" class="lat" value="">
                                    <input type="hidden" name="lng[]" class="lng" value="">
                                    <button class="show-map-btn show-map">
                                        <i class="icofont-google-map"></i>
                                        {{ __('Show Map') }}
                                    </button>
                                </div>
                            </div>

                            <div class="input-control">
                                <button type="button" class="btn btn-info add-station">
                                    <i class="icofont-plus"></i>
                                    {{ __('Add Station') }}
                                </button>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-control">
                                        <label for="truck_id" class="input-label" hidden>{{ __('Truck Name') }}</label>
                                        <select name="truck_id" class="input-field">
                                            <option value="">{{ __('Select Truck') }}</option>
                                            @forelse($trucks as $truck)
                                                <option value="{{ $truck->id }}">{{ $truck->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6"></div>
                            </div>

                            <div class="input-control">
                                <input type="submit" class="input-submit" value="{{ __('Calculate Price') }}">
                                <input type="submit" class="input-submit" value="{{ __('Make the order') }}">
                            </div>

                        </form>
                    </div>

                    <div class="col-lg-5">
                        <div id="estimate">
                            <h2>{{ __('Total Price') }}</h2>

                            <div>
                                <div class="pick_pack_cost">
                                    Pick/Pack:<br>
                                    <span class="currency">0.00</span>
                                </div>

                                <div class="shipping">
                                    Shipping:<br>
                                    <span class="currency">0.00</span>
                                </div>

                                <div class="total">
                                    <strong>Total:<br>
                                        <span class="currency">0.00</span>
                                    </strong>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

             </section>
        </div>
    </main>
@endsection

