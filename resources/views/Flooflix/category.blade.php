@extends('Flooflix.layouts.base')
@section('content')
@include('Flooflix.layouts.header')
<!-- Main -->  
    <article role="main" class="min-100 pb-5 bg-black" >
        <div class="row separator mx-5 azure">
            <header>
                <h1 class="font-alfa azure mt-5">{{ $category->genre }}</h1>
            </header>    
        </div>

        <!-- movies line -->
        @foreach ($movies as $tab)
        <div class="row mt-5">
            @foreach ($tab as $movie)
            <div class="col-md-2 col-sm-4 text-center">
                <a href="{{ route('movie',[$movie->title]) }}" class="azure hover-coral">
                    <figure class="figure">
                        @foreach ($pictures as $picture)
                            @if ($picture->id == $movie->picture_id)
                            <img src="{{ asset($picture->style) }}" alt="{{ $movie->title }}" class="figure-img image">
                            @endif
                        @endforeach         
                            <figcaption class="fig-caption font-alfa hover-coral">{{ $movie->title }}</figcaption>        
                    </figure>
                </a>
            </div>     
            @endforeach
        </div>   
        @endforeach
        <div class="row separator-top azure mx-5 pt-5 justify-content-center">
            <footer class="col col-auto">
                <nav aria-label="Navigation">
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#">Précédent</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                    </ul>
                </nav>   
            </footer>
        </div>
    </article>
@include('Flooflix.layouts.footer')
@include('Flooflix.layouts.varJS')
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/homeScript.js"></script>
@endsection