@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article role="main">
    <div class="container-fluid">
        <div class="row pt-5 pb-5">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 bg-white">
                @include('Flooflix.partials.message')
                <header class="text-center mt-4">
                    <h1 class="font-alfa black">{{ __('Ajouter les liens - Etape 5') }}</h1>
                </header>
                <form action="{{ action('MovieController@storeStep5', $movie) }}" class="mt-5 mb-5 mx-5" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="trailer" class="font-alfa black">Lien de la bande annonce</label>
                        <textarea name="trailer" cols="30" rows="5" class="form-control {{ $errors->has('trailer') ? 'is-invalid' : ''}}" value="{{ old('trailer') }}"></textarea>
                        @if ($errors->has('trailer'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('trailer')) }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="movie" class="font-alfa black">Lien de la video du film</label>
                        <textarea name="movie" cols="30" rows="5" class="form-control {{ $errors->has('movie') ? 'is-invalid' : ''}}" value="{{ old('movie') }}"></textarea>
                        @if ($errors->has('movie'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('movie')) }}</p>
                        @endif
                    </div>  
                    <div class="row mt-5 justify-content-center">
                        <div class="col col-auto">
                            <button type="submit" class="btn btn-warning btn-md font-alfa">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</article>
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/createMovieStep2Script.js"></script>
@endsection