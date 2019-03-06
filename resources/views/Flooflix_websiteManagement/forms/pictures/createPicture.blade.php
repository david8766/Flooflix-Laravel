@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
    <article class="">
        <div class="container">
            <div class="row pt-5">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 bg-white">
                    <header class="text-center mt-4">
                        <h1 class="font-alfa black">Ajouter une image</h1>
                    </header>
                    <form action="{{ action('PictureController@storePictureFromManagement') }}" class="mt-5 mx-5" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-5">
                            <label for="name" class="font-alfa black">Nom</label>
                            <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <p class="invalid-feedback" role="alert">{{ __($errors->first('name')) }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="picture" class="custom-file-input {{ $errors->has('picture') ? ' is-invalid' : '' }}" id="picture">
                                <label class="custom-file-label" for="picture">{{ __('Choisir un fichier') }}</label>
                                @if ($errors->has('picture'))
                                    <p class="invalid-feedback" role="alert">{{ __($errors->first('picture')) }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-5 justify-content-center">
                            <div class="col col-auto">
                                <button type="submit" class="btn btn-warning btn-md font-alfa">Valider</button>
                            </div>
                        </div>
                    </form>
                    <div class="row mt-5 justify-content-center">
                        <div class="col col-auto">
                            <a href="/GestionDesElementsVisuels" class="font-alfa black hover-coral">Annuler</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </article>
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/script.js"></script>