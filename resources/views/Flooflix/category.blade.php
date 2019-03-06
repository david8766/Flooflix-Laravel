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
        @php
            $chunks = $movies->chunk(6);
        @endphp
        @forelse ($chunks as $chunk)
            <div class="row mt-5">
                @foreach ($chunk as $movie)
                <div class="col-sm-6 col-lg-4 col-xl-2 text-center">   
                    <a href="{{ route('movie',[$movie->title]) }}" class="azure hover-coral">
                        <figure class="figure">
                            @foreach ($pictures as $picture)
                                @if ($picture->id == $movie->picture_id)
                                <img src="{{ asset($picture->style) }}" alt="{{ $movie->title }}" class="img-fluid figure-img image">
                                @endif
                            @endforeach         
                                <figcaption class="fig-caption font-alfa hover-coral">{{ $movie->title }}</figcaption>        
                        </figure>
                    </a>
                </div>               
                @endforeach   
            </div>  
        @empty
            <p class="font-alfa azure mt-5 text-center">Pas de films enregistrés pour cette catégorie</p>
        @endforelse    
        
        @if ($movies->total() > 18)
        <div class="row separator-top mt-5 justify-content-center">
            <div class="col col-auto mt-3">
                <nav aria-label="Navigation">
                    <ul class="pagination text-center" role="navigation">
                        @if ($movies->currentPage() != 1)
                        <li class="page-item"><a class="page-link black hover-red" href="{{ $movies->previousPageUrl() }}">Précédent</a></li>
                        @if ($movies->currentPage() >2)
                        <li class="page-item"><a class="page-link black hover-red" href="{{ $movies->url(1) }}">1</a></li>  
                        @endif
                        <li class="page-item"><a class="page-link black hover-red" href="{{ $movies->previousPageUrl() }}">{{$movies->currentPage()-1}}</a></li>    
                        @endif
                        <li class="page-item"><a class="page-link red" href="{{ $movies->url($movies->currentPage()) }}">{{$movies->currentPage()}}</a></li>
                        @if ($movies->currentPage() != $movies->lastPage())
                            @if ($movies->currentPage() != ($movies->lastPage()-1))
                            <li class="page-item"><a class="page-link black hover-red" href="{{ $movies->nextPageUrl() }}">{{$movies->currentPage()+1}}</a></li>             
                            @endif
                        <li class="page-item"><a class="page-link black hover-red" href="{{ $movies->url($movies->lastPage()) }}">{{$movies->lastPage()}}</a></li>
                        @endif
                        <li class="page-item"><a class="page-link black hover-red" href="{{ $movies->nextPageUrl() }}">Suivant</a></li>
                    </ul>
                </nav>
            </div>
        </div>    
        @endif
    </article>
@include('Flooflix.layouts.footer')
@include('Flooflix.layouts.varJS')
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/homeScript.js"></script>
@endsection