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
                    <h1 class="font-alfa black">Ajouter une couleur</h1>
                </header>
                <form action="{{ action('ColorController@storeColor') }}" class="mt-5 mx-5" method="POST">
                    @csrf
                    <div class="form-group mt-5">
                        <label for="name" class="font-alfa black">Nom</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="exemple : Rouge">
                    </div>
                    <label for="rgb" class="font-alfa black">code RGB</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">#</span>
                        </div>
                        <input type="text" class="form-control" name="rgb" placeholder="exemple : rgb(255,0,0)">
                    </div>
                    <div class="form-group mt-3">
                        <label for="opacity" class="font-alfa black">opacité</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Entre 0.0 et 1</span>
                            </div>
                            <input type="text" class="form-control" name="opacity" value="1">
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
                        <a href="/GestionDesElementsVisuels" class="font-alfa black" id="hover-coral">Annuler</a>
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