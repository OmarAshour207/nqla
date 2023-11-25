@forelse($types as $type)
    <option value="{{ $type->id }}" style="background-image: {{ $type->thumbImage }}">
        {{ $type->name }}
    </option>
@empty
    <option value="0">
        {{ __('No Truck types') }}
    </option>
@endforelse
