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
                    <h1 class="font-alfa black">Modifier le nom de la police :</h1>
                </header>
                <form action="{{ action('FontController@updateFontName',$font) }}" class="mt-5 mx-5" method="POST">
                    @csrf
                    <div class="form-group mt-5">
                        <label for="name" class="font-alfa black">Nom</label>
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="{{ $font->name}}">
                        @if ($errors->has('name'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('name')) }}</p>
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