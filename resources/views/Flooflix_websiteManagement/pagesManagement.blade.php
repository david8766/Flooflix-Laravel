@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article class="container font-alfa azure" role="main">
    <h1 class="mt-5 separator">Gestion du contenu des pages</h1>
    <h2 class="mt-5">Liste des pages du site modifiables :</h2>
    <ul>
        <li class="mt-3">La page d'accueil : 
            <a href="{{ route('edit.homePage') }}" class="azure ml-4 hover-red">Modifier</a> / 
            <a href="{{ route('home') }}" target="_blank" class="azure hover-red">Voir la page du site</a> / 
            <a href="{{ route('preview.homePage') }}" class="azure hover-red">Voir l'aperçu</a>
        </li>
        <li class="mt-3">La page compte client : <a href="" class="azure ml-4 hover-red">Modifier</a> / <a href="" class="azure hover-red">Voir la page du site</a> / <a href="" class="azure hover-red">Voir l'aperçu</a></li>
        <li class="mt-3">La page catégories de films : <a href="" class="azure ml-4 hover-red">Modifier</a> / <a href="" class="azure hover-red">Voir la page du site</a> / <a href="" class="azure hover-red">Voir l'aperçu</a></li>
        <li class="mt-3">La page des films par catégorie : <a href="" class="azure ml-4 hover-red">Modifier</a> / <a href="" class="azure hover-red">Voir la page du site</a> / <a href="" class="azure hover-red">Voir l'aperçu</a></li>
        <li class="mt-3">La page fiche film : <a href="" class="azure ml-4 hover-red">Modifier</a> / <a href="" class="azure hover-red">Voir la page du site</a> / <a href="" class="azure hover-red">Voir l'aperçu</a></li>
        <li class="mt-3">La page ma collection : <a href="" class="azure ml-4 hover-red">Modifier</a> / <a href="" class="azure hover-red">Voir la page du site</a> / <a href="" class="azure hover-red">Voir l'aperçu</a></li>
        <li class="mt-3">La page historique des achats : <a href="" class="azure ml-4 hover-red">Modifier</a> / <a href="" class="azure hover-red">Voir la page du site</a> / <a href="" class="azure hover-red">Voir l'aperçu</a></li>
    </ul>
    <h2 class="mt-5"><a href="" class="azure hover-red">Valider les aperçus</a></h2>
</article>
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/script.js"></script>
@endsection