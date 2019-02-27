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
                    <h1 class="font-alfa black">Ajouter un film</h1>
                </header>
                <form action="{{ action('MovieController@storeStep1') }}" class="mt-5 mx-5" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="font-alfa black">Choisir la catégorie:</label>
                        <select name="category" class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}" value="{{ old('category') }}">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ __($category->genre) }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('category')) }}</p>
                        @endif
                    </div>
                    <div class="form-group mt-5">
                        <label for="title" class="font-alfa black">Titre</label>
                        <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}">
                        @if ($errors->has('title'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('title')) }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="release_date" class="font-alfa black">Date de sortie</label>
                        <input type="date" name="release_date" class="form-control {{ $errors->has('release_date') ? ' is-invalid' : '' }}" value="{{ old('release_date') }}">
                        @if ($errors->has('release_date'))
                            <p class="invalid-feedback" role="alert">{{ __('Le champ date de sortie est obligatoire.') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="duration" class="font-alfa black">Durée</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="site-web">ex: 1h20min</span>
                            </div>
                            <input type="text" name ="duration" class="form-control {{ $errors->has('duration') ? ' is-invalid' : '' }}" value="{{ old('duration') }}">      
                        </div>
                        @if ($errors->has('duration'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('duration')) }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price" class="font-alfa black">Prix</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">&euro;</span>
                            </div>
                            <input type="number" name="price" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{ old('price') }}" placeholder="Montant du film en euros">
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                            @if ($errors->has('price'))
                                <p class="invalid-feedback" role="alert">{{ __('Le champ prix est obligatoire.') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="synopsis" class="font-alfa black">Synopsis</label>
                        <textarea name="synopsis" id="synopsis" cols="30" rows="10" class="form-control {{ $errors->has('synopsis') ? 'is-invalid' : ''}}" value="{{ old('synopsis') }}"></textarea>
                        @if ($errors->has('synopsis'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('synopsis')) }}</p>
                        @endif
                    </div>
                    <div class="row mt-5 justify-content-center">
                        <div class="col col-auto">
                            <button type="submit" class="btn btn-warning btn-md font-alfa">Enregistrer et passer à l'étape suivante</button>
                        </div>
                    </div>
                </form>
                <div class="row mt-5 justify-content-center">
                    <div class="col col-auto">
                        <a href="/GestionDesFilms" class="font-alfa black" id="hover-coral">Annuler</a>
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