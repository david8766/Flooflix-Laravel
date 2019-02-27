<div class="form-group">
    <div class="custom-file">
        <input type="file" name="picture" class="custom-file-input {{ $errors->has('picture') ? ' is-invalid' : '' }}" id="picture">
        <label class="custom-file-label" for="picture">{{ __('Choisir un fichier') }}</label>
        @if ($errors->has('picture'))
            <p class="invalid-feedback" role="alert">{{ __($errors->first('picture')) }}</p>
        @endif
    </div>
</div>
