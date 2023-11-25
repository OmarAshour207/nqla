@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="material-icons icon-20pt">home</i> {{ __('Home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Create') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ __('Insurance') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('insurances.store') }}">

                    @csrf
                    @include('dashboard.partials._errors')

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="city_id"> {{ __('City') }}</label> <br>
                            <select id="city_id" name="city_id" data-toggle="select" class="form-control select2">
                                <option value="" selected> {{ __('Select City') }} </option>
                                @forelse($cities as $city)
                                    <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}> {{ $city->name }} </option>
                                @empty
                                    <option value="" selected> {{ __('No Data') }} </option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <div class="form-group">
                                <label for="price"> {{ __("Price") }}</label>
                                <input id="price" name="price" type="text" class="form-control" placeholder="{{ __("Price") }}" value="{{ old("price") }}">
                            </div>
                        </div>
                    </div>

                    <div class="text-right mb-5">
                        <input type="submit" class="btn btn-success" value="{{ __('Add') }}">
                    </div>
                </form>
            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection
