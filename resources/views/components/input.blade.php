@php
    $label = $attributes['label'];
    $id = $attributes['id'];
    $name = $attributes['name'];
    $type = $attributes['type'];
    $value = $attributes['value'] ?? old($name);
@endphp
<div class="form-group mb-2">
    <label class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control" id="{{ $id }}" name="{{ $name }}"
        value="{{ $value }}" />
    @error($name)
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
