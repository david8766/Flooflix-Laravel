@extends('Flooflix.layouts.base')
@section('content')
<!-- Main -->
<section role="main" class="container-fluid m-0 p-0 min-100"> 
    @include('Flooflix.partials.message')
    <!-- Jumbotron -->
    <article class="jumbotron jumbotron-fluid text-center min-100">
    <h1 class="jumbotron-heading font-alfa">Réinitialisation de votre mot de passe:</h1>
    <h2 class="font-alfa">Bonjour {{$user->first_name}}!</h2>
    <p class="font-alfa">Le {{$date}}</p>
    <p class="font-alfa">Cliquez sur le lien ci-dessous pour être rediriger vers le formulaire de rénitialisation de votre ùmot de passe.</p>
   
    <a href="{{ route('password.reset',$token)}}" class="font-alfa hover-coral">Cliquez - ici</a>
       
    </article>
</section>
@include('Flooflix.layouts.scripts')
@endsection