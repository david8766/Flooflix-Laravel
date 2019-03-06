@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article role="main">
    <div class="container-fluid">
        <div class="row pt-5 pb-5">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 bg-white">
                <header class="text-center mt-4">
                    <h1 class="font-alfa black">Modifier la règle CSS de la police :</h1>
                </header>
                <form action="{{ action('FontController@updateFontStyle',$font) }}" class="mt-5 mx-5" method="POST">
                    @csrf
                    <div class="form-group mt-5">
                        <label for="style" class="font-alfa black">Style</label>
                    <input type="text" name="style" class="form-control {{ $errors->has('style') ? ' is-invalid' : '' }}" value="{{ old('style') }}" placeholder="{{ $font->style}}">
                        @if ($errors->has('style'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('style')) }}</p>
                        @endif
                    </div>
                    <div class="row mt-5 justify-content-center">
                        <div class="col col-auto">
                            <button type="submit" class="btn btn-warning btn-md font-alfa">Enregistrer</button>
                        </div>
                    </div>
                </form>
                <div class="row mt-5 justify-content-center">
                    <div class="col col-auto">
                        <a href="{{ route('font.informations',$font) }}" class="font-alfa black hover-coral">Annuler</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</article>
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/script.js"></script>