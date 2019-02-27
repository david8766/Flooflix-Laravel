@extends('Flooflix.websiteManagement.layouts.base')
@section('content')
@include('Flooflix.websiteManagement.layouts.header')
<!-- Main -->
<article role="main">
    <div class="container-fluid">
        <div class="row pt-5 pb-5">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 bg-white">
                <header class="text-center mt-4">
                    <h1 class="font-alfa black">Modifier la date de sortie :</h1>
                    <p class="font-alfa mt-5">{{ $movie->title }}</p>
                </header>
                <form action="{{ action('MovieController@updateReleaseDate',$movie) }}" class="mt-5 mx-5" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="release_date" class="font-alfa black">Date de sortie</label>
                        <input type="date" name="release_date" class="form-control {{ $errors->has('release_date') ? ' is-invalid' : '' }}" value="{{ old('release_date') }}" id="release_date">
                        @if ($errors->has('release_date'))
                            <p class="invalid-feedback" role="alert">{{ __('Le champ date de sortie est obligatoire.') }}</p>
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
                        <a href="{{ route('movie.informations',[$movie]) }}" class="font-alfa black" id="hover-coral">Annuler</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</article>
@include('Flooflix.layouts.scripts')
<script>
    $('document').ready(function() {
        document.body.style.backgroundColor = 'black';
    })
</script>