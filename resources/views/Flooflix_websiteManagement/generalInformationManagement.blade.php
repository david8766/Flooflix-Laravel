@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article class="container font-alfa azure">
    <h1 class="mt-5 separator">Gestion des informations générales</h1>
    <h2 class="mt-5">Liste des pages d'informations modifiables :</h2>
    <ul>
        <li class="mt-3"><a href="" class="azure ml-4" id="hover-red">La page des conditions d'utilisation</a></li>
        <li class="mt-3"><a href="" class="azure ml-4" id="hover-red">La page des conditions générales de vente</a></li>
        <li class="mt-3"><a href="" class="azure ml-4" id="hover-red">La page de la politique de confidentialité</a></li>
        <li class="mt-3"><a href="" class="azure ml-4" id="hover-red">La page des mentions légales</a></li>
        <li class="mt-3"><a href="" class="azure ml-4" id="hover-red">La page sur les cookies</a></li>
        <li class="mt-3"><a href="" class="azure ml-4" id="hover-red">La page de contact</a></li>
    </ul>
</article>
@include('Flooflix.layouts.scripts')
<script>
    $('document').ready(function() {
        document.body.style.backgroundColor = 'black';
    })
</script>
@endsection