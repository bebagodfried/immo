@php
$class  ??= null;
$name   ??= '';
$value  ??= '';
$label  ??= ucfirst($name);
@endphp

<div class="{{ $class }} group-control">

    <input type="hidden" name="{{ $name }}" value="0">
    <input type="checkbox" role="switch"
           class="form-check-input @error($name) is-invalid @enderror"
           id="{{ $name }}"
           name="{{ $name }}"
           value="1"
        @checked(old($name, $value ?? false))>

    <label for="{{ $name }}" class="form-check-label">{{ $label }}</label>

    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
