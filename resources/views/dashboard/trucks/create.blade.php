@push('admin_scripts')
<script type="text/javascript">
    var path = 'trucks';
    Dropzone.autoDiscover = false;
    $(document).ready(function () {
        $('#mainphoto').dropzone({
            url: '{{ route('upload.image') }}',
            paramName:'image',
            autoDiscover: false,
            uploadMultiple: false,
            maxFiles: 1,
            acceptedFiles: 'image/*',
            dictDefaultMessage: '{{ __('Upload Image') }}',
            dictRemoveFile: '<button class="btn btn-danger"> <i class="fa fa-trash center"></i></button>',
            params: {
                _token: '{{ csrf_token() }}',
                path: path,
                width: 55,
                height: 55
            },
            addRemoveLinks: true,
            removedfile:function (file) {
                var imageName = $('.image_name').val();
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: '{{ route('remove.image') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        image: imageName,
                        path: path
                    }
                });
                var fmock;
                return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement): void 0;
            },
            init: function () {
                @if(!empty(old('image')))
                    @php $image = \App\Models\Media::where('id', old('image'))->first(); @endphp
                    var mock = { name: '{{ $image->name }}', size: 2};
                    this.emit('addedfile', mock);
                    this.emit('thumbnail', mock, '{{ $image->tempMediaImage }}');
                    this.emit('complete', mock);
                    $('.dz-progress').remove();
                @endif

                    this.on("success", function (file, image) {
                    $('.image_name').val(image);
                })
            }
        });
    });
</script>
<style>
    .dropzone {
        width: 200px;
        height: 90px;
        min-height: 0px !important;
        background-color: #1C2260;
        border: #1C2260;
    }
</style>
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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Create') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ __('Trucks') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('trucks.store') }}">

                    @csrf
                    @include('dashboard.partials._errors')

                    @foreach($locales as $key => $locale)
                        <div class="form-group">
                            <label for="name:{{ $key }}"> {{ __("$locale Name") }}</label>
                            <input id="name:{{ $key }}" name="name:{{ $key }}" dir="auto" type="text" class="form-control" placeholder="{{ __("$locale Name") }}" value="{{ old("name:$key") }}">
                        </div>
                    @endforeach

                    <div class="form-group">
                        <input class="image_name" type="hidden" name="image" value="">
                    </div>

                    <div class="form-group">
                        <label> {{ __('Image') }} </label>
                        <div class="dropzone" id="mainphoto"></div>
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
