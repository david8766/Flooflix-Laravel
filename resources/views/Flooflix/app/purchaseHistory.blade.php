@extends('Flooflix.layouts.base')
@section('content')
@include('Flooflix.layouts.header')
@php
    dump($movies);
@endphp
<!-- Main -->
<article class="min-88 pt-5 pb-5 bg-black">
    <div class="row separator azure mx-5">
        <header>
            <h1 class="font-alfa azure">Historique des achats</h1>
        </header>
    </div>
    <div class="container-fluid">
        @forelse ($movies as $item)
            <div class="row mt-5">
                @foreach ($item as $movie)   
                <div class="col-md-2 text-right">
                    <figure class="figure">
                    <img width="150px" height="250px" src="{{ asset($movie->picture->style) }}" alt="{{ $movie->movie->title }}" class="img-fluid figure-img">
                    </figure>
                </div>  
                <div class="col-md-2 align-self-center">
                    <p class="font-alfa azure">{{ __($movie->category->genre) }}</p>
                    <p class="font-alfa azure">
                        <a href="{{ route('movie',[$movie->movie->title]) }}" class="azure hover-coral">
                            {{$movie->movie->title}}
                        </a>
                    </p>
                    <p class="font-alfa azure">{{ __('acheté le : ' . $movie->date)}}</p>
                </div>       
                @endforeach
            </div>   
        @empty
            <p class="azure mt-5 text-center">Votre collection est vide.</p>
        @endforelse       
    </div>
</article>
@include('Flooflix.layouts.footer')
@include('Flooflix.layouts.varJS')
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/homeScript.js"></script>
@endsection