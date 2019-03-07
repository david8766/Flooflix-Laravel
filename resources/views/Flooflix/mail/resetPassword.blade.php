@extends('Flooflix.layouts.base')
@section('content')
<!-- Main -->
<section role="main" class="container-fluid m-0 p-0 min-100"> 
    <!-- Jumbotron -->
    <article class="jumbotron jumbotron-fluid text-center min-100 bg-cine pt-1" id="first-article">
    <h1 class="jumbotron-heading font-alfa">Réinitialisation de votre mot de passe:</h1>
    <h2 class="font-alfa">Bonjour {{$user->first_name}}!</h2>
    <p class="font-alfa">Le {{$date}}</p>
    <p class="font-alfa">Cliquez sur le lien ci-dessous pour être rediriger vers le formulaire de rénitialisation de votre ùmot de passe.</p>
    <a href="http://127.0.0.1:8000/RéinitialisationDuMotDePasse" class="font-alfa hover-coral">Cliquez - ici</a>
       
    </article>
</section>
@include('Flooflix.layouts.scripts')
@endsection