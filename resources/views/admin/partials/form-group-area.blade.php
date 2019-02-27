<div class="form-group">
    <label for="text">{{__('Tapez votre texte')}}</label>
<textarea class="form-control {{ $errors->has('text') ? 'is-invalid' : ''}}" name="text" id="text" rows="8">{{ $text }}</textarea>
@if ($errors->has($text))
    <p class="invalid-feedback" role="alert">{{ __($errors->first('text')) }}</p>
@endif
</div>