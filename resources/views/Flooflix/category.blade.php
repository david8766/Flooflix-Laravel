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
        @forelse ($movies as $tab)
            <div class="row mt-5">
                @foreach ($tab as $movie)
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
    </article>
@include('Flooflix.layouts.footer')
@include('Flooflix.layouts.varJS')
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/homeScript.js"></script>
@endsection