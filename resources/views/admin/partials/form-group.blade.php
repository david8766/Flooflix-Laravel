<div class="form-group">
    <label for="{{ $name }}">{{ $title }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control {{ $errors->has($name) ? ' is-invalid' : '' }}" value="{{ $value }}">
    @if ($errors->has($name))
        <p class="invalid-feedback" role="alert">{{ __($errors->first($name)) }}</p>
    @endif
</div>
