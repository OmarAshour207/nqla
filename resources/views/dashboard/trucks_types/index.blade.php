@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="material-icons icon-20pt">home</i> {{ __('Home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Trucks Types') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ __('Trucks Types') }} </h1>
                </div>
                <a href="{{ route('types.create') }}" class="btn btn-success ml-3">{{ __('Create') }} <i class="material-icons">add</i></a>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card">
                <div class="table-responsive" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>

                    <table class="table mb-0 thead-border-top-0 table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10%;"> # </th>
                                <th style="width: 20%;"> {{ __('Name') }} </th>
                                <th style="width: 20%;"> {{ __('Truck') }} </th>
                                <th style="width: 40%;"> {{ __('Image') }} </th>
                                <th style="width: 10%;"> {{ __('Action') }} </th>
                            </tr>
                        </thead>
                        <tbody class="list" id="companies">
                            @forelse ($types as $index => $type)
                            <tr>
                                <td style="width: 10%;">
                                    <div class="badge badge-soft-dark"> {{ $index+1 }} </div>
                                </td>

                                <td style="width: 20%;">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            {{ mb_substr($type->name, 0, 40) }}
                                        </div>
                                    </div>
                                </td>

                                <td style="width: 20%;">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            {{ mb_substr($type->truck->name, 0, 40) }}
                                        </div>
                                    </div>
                                </td>

                                <td style="width: 10%;">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $type->typeImage }}" alt="{{ $type->name }}">
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <a href="{{ route('types.edit', $type->id) }}" class="btn btn-sm btn-link">
                                        <i class="fa fa-edit fa-2x"></i>
                                    </a>
                                    <form action="{{ route('types.destroy', $type->id) }}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <h1> {{ __('No records') }} </h1>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-4">
                {{ $types->links('dashboard.pagination.custom') }}
            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection
