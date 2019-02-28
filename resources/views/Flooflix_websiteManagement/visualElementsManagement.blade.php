@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article role="main" class="container font-alfa azure" role="main">
    <h1 class="mt-5 separator">Gestion des éléments visuels</h1>
    <h2 class="mt-4"><u>Les polices :</u></h2>
    <p class="mt-4">Nombre total de polices enregistrées : {{ count($fonts )}}</p>
    <ul>
        <li class="mt-4"> <a href="/ListeDesPolices" class="font-alfa azure hover-red">Voir la liste</a> </li>
        <li class="mt-4"> <a href="/AjouterUnePolice" class="font-alfa azure hover-red">Ajouter une police</a> </li>
        <li class="mt-4">
            <div class="row">
                <p class="text-left mt-3">Rechercher une police</p>
                <form class="form-inline my-2 my-lg-0 ml-3" role="search">
                    <input class="form-control-md mr-sm-2 margin-left-2" type="search" placeholder="" aria-label="Search">
                    <button class="btn btn-outline-danger btn-md my-2 my-sm-0 ml-2" type="submit">Rechercher</button>
                </form>
            </div>
        </li>
    </ul>
    <h2><u>Les couleurs</u></h2>
    <p class="mt-4">Nombre total de couleurs enregistrées : {{ count($colors) }}</p>
    <ul>
        <li class="mt-4"> <a href="ListeDesCouleurs" class="font-alfa azure hover-red">Voir la liste</a> </li>
        <li class="mt-4"> <a href="AjouterUneCouleur" class="font-alfa azure hover-red">Ajouter une couleur</a> </li>
        <li class="mt-4">
            <div class="row">
                <p class="text-left mt-3">Rechercher une couleur</p>
                <form class="form-inline my-2 my-lg-0 ml-3" role="search">
                    <input class="form-control-md mr-sm-2 margin-left-2" type="search" placeholder="" aria-label="Search">
                    <button class="btn btn-outline-danger btn-md my-2 my-sm-0 ml-2" type="submit">Rechercher</button>
                </form>
            </div>
        </li>
    </ul>
    <h2><u>Les images</u></h2>
    <p class="mt-4">Nombre total d'images enregistrées : {{ count($pictures) }}</p>
    <ul>
        <li class="mt-4"> <a href="ListeDesImages" class="font-alfa azure hover-red">Voir la liste</a> </li>
        <li class="mt-4"> <a href="AjouterUneImage" class="font-alfa azure hover-red">Ajouter une image</a> </li>
        <li class="mt-4">
            <div class="row">
                <p class="text-left mt-3">Rechercher une image</p>
                <form action="{{ action('PictureController@showPictureInformationsByResearch') }}" class="form-inline my-2 my-lg-0 ml-3" role="search" method="POST">
                    @csrf
                    <input class="form-control-md mr-sm-2 margin-left-2" type="search" name="search" placeholder="nom de l'image" aria-label="Search">
                    <button class="btn btn-outline-danger btn-md my-2 my-sm-0 ml-2" type="submit">Rechercher</button>
                </form>
            </div>
        </li>
    </ul>
</article>
@include('Flooflix.layouts.scripts')
<script>
    $('document').ready(function() {
        document.body.style.backgroundColor = 'black';
    })
</script>
@endsection