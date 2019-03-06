@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article role="main">
    <div class="container-fluid">
        <div class="row pt-5 pb-5">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 bg-white">
                <header class="text-center mt-4">
                    <h1 class="font-alfa black">Modifier le lien pour la bande annonce :</h1>
                    <p class="font-alfa mt-5">{{ $movie->title }}</p>
                </header>
                <form action="{{ action('MovieController@updateTrailerLink',$movie) }}" class="mt-5 mx-5" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="trailer" class="font-alfa black">Lien de la bande annonce</label>
                    <textarea name="trailer" cols="30" rows="5" class="form-control {{ $errors->has('trailer') ? 'is-invalid' : ''}}" value="{{ old('trailer') }}"></textarea>
                        @if ($errors->has('trailer'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('trailer')) }}</p>
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
                        <a href="{{ route('movie.informations',[$movie]) }}" class="font-alfa black hover-coral">Annuler</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</article>
@include('Flooflix.layouts.scripts')
<script>
    $('document').ready(function() {
        document.body.style.backgroundColor = 'black';
    })
</script>