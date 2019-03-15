@extends('Flooflix.layouts.base')
@section('content')
<!-- Main -->
<section role="main" class="container-fluid m-0 p-0 min-100"> 
    @include('Flooflix.partials.message')
    <!-- Jumbotron -->
    <article class="jumbotron jumbotron-fluid text-center min-100">
        <h1 class="jumbotron-heading font-alfa">Contact:</h1>
        <h3 class="font-alfa">Mesage de : {{ $last_name }}  {{ $first_name }} !</h3>
        <p class="font-alfa">Email du correspondant : {{ $email }}</p>
        <p class="font-alfa">Envoyé le {{ $date }}</p>
        
        <h3>Sujet: {{ $subject }}</h3>
        <p class="font-alfa">Message: {{ $text }}</p>
    </article>
</section>
@include('Flooflix.layouts.scripts')
@endsection