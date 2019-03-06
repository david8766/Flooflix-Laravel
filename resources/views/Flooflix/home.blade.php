@extends('Flooflix.layouts.base')
@section('content')
@include('Flooflix.layouts.header')

<!-- Main -->
<section role="main" class="container-fluid m-0 p-0 min-100"> 
    <!-- Jumbotron -->
    @include('Flooflix.partials.message')
    <article class="jumbotron jumbotron-fluid text-center min-100 bg-cine pt-1" id="first-article">
    <h1 id="home-title" class="jumbotron-heading text-3d display-3 font-anton"></h1>
        <br>
        <p class="relief" id="home-desc"></p>
        <p class="relief" id="home-catch"></p>     
    </article>

    <!-- Second article -->
    <article id="second-article">
        <header>
            <h2 class="ml-3 pt-4" id="home-top"></h2>
        </header>
        <div class="row mt-5 pb-4">
            @forelse ($top_movies as $movie)
                @include('Flooflix.components.topMoviesPoster')          
            @empty
                <p class="font-alfa azure mt-5 text-center">Pas de films enregistrés</p>
            @endforelse
        </div>
    </article>

    <!-- Third article-->
    <article id="third-article">
        <header>
            <h2 class="ml-3 pt-4" id="home-new"></h2>
        </header>
        <div class="row mt-5 pb-4">
            @forelse ($new_movies as $movie)
                @include('Flooflix.components.newMoviesPoster')            
            @empty
                <p class="font-alfa azure mt-5 text-center">Pas de films enregistrés</p>
            @endforelse
        </div>
    </article>
</section>
@include('Flooflix.layouts.footer')
@include('Flooflix.layouts.varJS')
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/home.js"></script>
@endsection