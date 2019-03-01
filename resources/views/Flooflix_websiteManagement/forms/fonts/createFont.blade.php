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
                        <h1 class="font-alfa black">Ajouter une police</h1>
                    </header>
                    <form action="{{ action('FontController@storeFont') }}" class="mt-5 mx-5" method="POST">
                        @csrf
                        <div class="form-group mt-5">
                            <label for="name" class="font-alfa black">Nom</label>
                            <div class="input-group-prepend"><span class="input-group-text font-alfa" id="name">Exemple:Roboto</span></div>
                            <input type="text" class="form-control" name="name" aria-label="name">
                        </div>
                        <div class="form-group mt-3">
                            <label for="link" class="font-alfa black mt-3">Lien</label>
                            <div class="input-group-prepend"><span class="input-group-text font-alfa" id="link">Exemple : https://fonts.googleapis.com/css?family=Roboto</span></div>
                            <input type="text" class="form-control" name="link" aria-label="link">
                        </div>
                        <div class="form-group mt-3">
                            <label for="style" class="font-alfa black">Règle css</label>
                            <div class="input-group-prepend"><span class="input-group-text font-alfa" id="style">Exemple : 'Roboto'</span></div>
                            <input type="text" class="form-control" name="style" aria-label="style">
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
        <div class="row mt-4 justify-content-center">
            <a href="https://fonts.google.com/" target="_blank" class="azure hover-red font-alfa">{{ "Google fonts" }}</a> 
        </div>
    </article>
@include('Flooflix.layouts.scripts')
<script>
    $('document').ready(function() {
        document.body.style.backgroundColor = 'black';
    })
</script>