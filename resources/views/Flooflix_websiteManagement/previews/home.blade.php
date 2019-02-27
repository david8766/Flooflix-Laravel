@extends('Flooflix.layouts.base')
@section('content')
@include('Flooflix.layouts.header')
<!-- Main -->
<section role="main" class="container-fluid m-0 p-0"> 
    <!-- Jumbotron -->
    @include('Flooflix.partials.message')
    <article class="jumbotron jumbotron-fluid text-center min-88 pt-1" id="first-article">
        <h1 id="home-title" class="jumbotron-heading text-3d display-3"></h1>
        <br>
        <p id="home-desc"></p>
        <p id="home-catch"></p>     
    </article>

    <!-- First article -->
    <article id="second-article">
        <header>
            <h2 class="ml-3 pt-4" id="home-top"></h2>
        </header>
        <div class="row mt-5 pb-4">
            @foreach ($top_movies as $movie)
            @include('Flooflix.components.topMoviesPoster')
            @endforeach
        </div>
    </article>

    <!-- Second article-->
    <article id="third-article">
        <header>
            <h2 class="ml-3 pt-4" id="home-new"></h2>
        </header>
        <div class="row mt-5 pb-4">
            @foreach ($new_movies as $movie)
            @include('Flooflix.components.newMoviesPoster')
            @endforeach
        </div>
    </article>
</section>
@include('Flooflix.layouts.footer')
@include('Flooflix.layouts.varJS')
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/websiteManagement/homePreview.js"></script>
@endsection

