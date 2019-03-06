@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
<!-- Main -->
<article role="main" class="container font-alfa">
    @include('Flooflix.partials.message')
    <header class="row mt-5 mb-5">            
        <div class="col">
            <h1 class="font-alfa azure separator">Bienvenue sur la page d'administration de votre site</h1>
        </div>            
    </header>
    <div class="row black">   
        <div class="col bg-white ">
            <div class="row">
                <div class="col-6">
                    <h2 class="text-left mt-4"><a href="/GestionDesUtilisateurs" class="black hover-red"><i class="fas fa-arrow-circle-right"></i>  Gestion des utilisateurs</a></h2>
                    <p class="text-left mt-3">Rechercher un utilisateur</p>
                    <form action="{{ action('UserController@addUserByResearch') }}" class="form-inline my-2 my-lg-0" role="search" method="POST">
                        @csrf
                        <input class="form-control-sm mr-sm-2" type="text" name="search" placeholder="Prénom Nom" aria-label="Search">
                        <button class="btn btn-outline-danger btn-sm my-2 my-sm-0" type="submit">OK</button>
                    </form>
                </div>
                <div class="col-6">
                    <h2 class="text-left mt-4"><a href="/GestionDesPages" class="black hover-red"><i class="fas fa-arrow-circle-right"></i>  Gestion des pages</a></h2>
                    <p class="text-left mt-3">Rechercher une page</p>
                    <form action="" class="form-inline my-2 my-lg-0" role="search" method="POST">
                        @csrf
                        <input class="form-control-sm mr-sm-2" type="text" placeholder="" aria-label="Search">
                        <button class="btn btn-outline-danger btn-sm my-2 my-sm-0" type="submit">OK</button>
                    </form>
                </div>
            </div>     
            <div class="row mt-4">
                <div class="col-6">
                    <h2 class="text-left mt-4"><a href="/GestionDesInformationsGenerales" class="black hover-red"><i class="fas fa-arrow-circle-right"></i>  Gestion des informations générales</a></h2>
                    <p class="text-left mt-3">Rechercher une information</p>
                    <form action="" class="form-inline my-2 my-lg-0" role="search" method="POST">
                        @csrf
                        <input class="form-control-sm mr-sm-2" type="text" placeholder="" aria-label="Search">
                        <button class="btn btn-outline-danger btn-sm my-2 my-sm-0" type="submit">OK</button>
                    </form>
                </div>
                <div class="col-6">
                    <h2 class="text-left mt-4"><a href="/GestionDesFilms" class="black hover-red"><i class="fas fa-arrow-circle-right"></i>  Gestion des films</a></h2>
                    <p class="text-left mt-3">Rechercher un film</p>
                    <form action="{{ action('MovieController@showMovieByResearchInWebsiteManagement') }}" class="form-inline my-2 my-lg-0" role="search" method="POST">
                        @csrf
                        <input class="form-control-sm mr-sm-2" type="text" name="search" placeholder="titre du film" aria-label="Search">
                        <button class="btn btn-outline-danger btn-sm my-2 my-sm-0" type="submit">OK</button>
                    </form>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <h2 class="text-left mb-4 mt-4"><a href="GestionDesElementsVisuels" class="black hover-red"><i class="fas fa-arrow-circle-right"></i>  Gestion des éléments visuels</a></h2>
                </div>
            </div>
        </div>   
    </div>
</article>
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/script.js"></script>
@endsection