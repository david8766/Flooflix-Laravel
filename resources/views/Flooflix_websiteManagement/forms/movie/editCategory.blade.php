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
                    <h1 class="font-alfa black">Modifier la catégorie :</h1>
                    <p class="font-alfa mt-5">{{ $movie->title }}</p>
                </header>
                <form action="{{ action('MovieController@updateCategory',$movie) }}" class="mt-5 mx-5" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="font-alfa black">Choisir la catégorie:</label>
                        <select name="category" class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}" value="{{ old('category') }}" placeholder="selectionner une image">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ __($category->genre) }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('category')) }}</p>
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