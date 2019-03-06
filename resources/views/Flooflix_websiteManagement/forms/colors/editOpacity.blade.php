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
                    <h1 class="font-alfa black">Modifier l'opacité de la couleur :</h1>
                </header>
                <form action="{{ action('ColorController@updateOpacity',$color) }}" class="mt-5 mx-5" method="POST">
                    @csrf
                    <div class="form-group mt-5">
                        <label for="opacity" class="font-alfa black">l'opacité : entre 0.0 et 1</label>
                    <input type="text" name="opacity" class="form-control {{ $errors->has('opacity') ? ' is-invalid' : '' }}" value="{{ old('opacity') }}" placeholder="{{ $color->opacity }}">
                        @if ($errors->has('opacity'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('opacity')) }}</p>
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
                        <a href="{{ route('color.informations',$color) }}" class="font-alfa black hover-coral">Annuler</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</article>
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/script.js"></script>