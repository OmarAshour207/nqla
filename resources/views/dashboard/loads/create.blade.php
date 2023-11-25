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
                    <h1 class="m-0"> {{ __('Loads') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('loads.store') }}">

                    @csrf
                    @include('dashboard.partials._errors')



                    <div class="row no-gutters">
                        <div class="col card-form__body card-body">

                            @foreach($locales as $key => $locale)
                                <div class="form-group">
                                    <label for="name:{{ $key }}"> {{ __("$locale Name") }}</label>
                                    <input id="name:{{ $key }}" name="name:{{ $key }}" dir="auto" type="text" class="form-control" placeholder="{{ __("$locale Name") }}" value="{{ old("name:$key") }}">
                                </div>
                            @endforeach

                            <div class="row">
                                <div class="form-group col">
                                    <label for="truck_id"> {{ __('Truck Name') }}</label> <br>
                                    <select id="truck_id" name="truck_id" data-toggle="select" class="form-control select2 truck_id">
                                        <option value="" selected> {{ __('Select Truck Name') }} </option>
                                        @forelse($trucks as $truck)
                                            <option value="{{ $truck->id }}" {{ old('truck_id') == $truck->id ? 'selected' : '' }}> {{ $truck->name }} </option>
                                        @empty
                                            <option selected> {{ __('No Trucks') }} </option>
                                        @endforelse
                                    </select>
                                </div>

                                <div class="form-group col">
                                    <label for="truck_type_id"> {{ __('Truck Types') }}</label> <br>
                                    <select id="truck_type_id" name="truck_type_id" data-toggle="select" class="form-control select2 truck_types">
                                        <option value="" selected> {{ __('Select Truck first') }} </option>
                                    </select>
                                </div>

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

@push('admin_scripts')
    <script src="{{ asset('dashboard/js/custom/truck_types.js') }}"></script>
@endpush
