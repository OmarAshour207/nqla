<option> {{ __('Truck Type Name') }} </option>
@forelse($types as $type)
    <option value="{{ $type->id }}" {{ old('truck_type_id', isset($typeId) ?? '') == $type->id ? 'selected' : '' }}>
        {{ $type->name }}
    </option>
@empty
    <option> {{ __('No Types') }} </option>
@endforelse
