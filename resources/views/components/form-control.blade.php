@props(['name'])

<div class="form-control" data-invalid="{{ var_export($errors->has($name), true) }}">
    {{ $slot }}
</div>
