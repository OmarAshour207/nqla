@push('admin_scripts')
    <script src="{{ asset('dashboard/js/custom/truck_types.js') }}"></script>
@endpush
@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="material-icons icon-20pt">home</i> {{ __('Home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Edit') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ __('Prices') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('prices.update', $price->id) }}">

                    @csrf
                    @method('put')

                    @include('dashboard.partials._errors')


                    <div class="form-group">
                        <label for="city_id"> {{ __('City Name') }}</label> <br>
                        <select id="city_id" name="city_id" data-toggle="select" class="form-control select2">
                            <option value="" selected> {{ __('Select City Name') }} </option>
                            @forelse($cities as $city)
                                <option value="{{ $city->id }}" {{ old('city_id', $price->city_id) == $city->id ? 'selected' : '' }}> {{ $city->name }} </option>
                            @empty
                                <option selected> {{ __('No Cities') }} </option>
                            @endforelse
                        </select>
                    </div>

                    <div class="row no-gutters">
                        <div class="col card-form__body card-body">
                            <div class="row">

                                <div class="form-group col">
                                    <label for="truck_id"> {{ __('Truck Name') }}</label> <br>
                                    <select id="truck_id" name="truck_id" data-toggle="select" class="form-control select2 truck_id">
                                        <option value="" selected> {{ __('Select Truck Name') }} </option>
                                        @forelse($trucks as $truck)
                                            <option value="{{ $truck->id }}" {{ old('truck_id', $price->truck_id) == $truck->id ? 'selected' : '' }}> {{ $truck->name }} </option>
                                        @empty
                                            <option selected> {{ __('No Cities') }} </option>
                                        @endforelse
                                    </select>
                                </div>

                                <div class="form-group col">
                                    <label for="truck_type_id"> {{ __('Truck Types') }}</label> <br>
                                    <select id="truck_type_id" name="truck_type_id" data-toggle="select" class="form-control select2 truck_types">
                                        <option value="{{ $type->id }}" selected>
                                            {{ $type->name }}
                                        </option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price"> {{ __("Price") }}</label>
                        <input id="price" name="price" type="text" class="form-control" placeholder="{{ __("Price") }}" value="{{ old("price", $price->price) }}">
                    </div>

                    <div class="text-right mb-5">
                        <input type="submit" class="btn btn-success" value="{{ __('Update') }}">
                    </div>
                </form>
            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection
