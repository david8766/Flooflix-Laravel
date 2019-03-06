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
                    <h1 class="font-alfa black">Modifier les information de :</h1>
                    <p>{{$person->first_name . ' ' . $person->last_name}}</p>
                </header>
                <form action="{{ action('PersonController@update',[$movie,$person]) }}" class="mt-5 mx-5" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" value="{{ old('first_name') }}" placeholder="prénom">
                        <input type="text" name="last_name" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" value="{{ old('last_name') }}" placeholder="nom">            
                        @if ($errors->has('last_name'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('last_name')) }}</p>
                        @endif
                        @if ($errors->has('first_name'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('first_name')) }}</p>
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
            <div class="col-lg-3"></div>
        </div>
    </div>
</article>
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/script.js"></script>