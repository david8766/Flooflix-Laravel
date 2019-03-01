@extends('Flooflix.layouts.base')
@section('content')
@include('Flooflix.layouts.header')
@php
    $user = auth()->user('id');
@endphp
<!-- Main -->
@include('Flooflix.partials.message')
<section role="main" class="min-100 bg-black">
    <div class="row separator mx-5 azure">
        <header>
            <h1 class="mt-5 font-alfa azure">Ma collection</h1>
        </header>
    </div>
    @forelse ($collection as $category => $movies)  
        <article>                   
            <div class="row mx-5 mb-4">
                <header>
                    <h2 class="font-alfa azure mt-5">{{ __($category) }}</h2>
                </header>
            </div>
            <div id="carouselCat{{$category}}Indicators" class="carousel slide" data-ride="carousel">
                <div class="row">
                    <ol class="carousel-indicators">
                        @foreach ($movies as $key => $tab)   
                            <li data-target="#carouselCat{{$category}}Indicators" data-slide-to="{{$key}}" class="active"></li>          
                        @endforeach
                    </ol>
                </div>
                <div class="carousel-inner">
                    @foreach ($movies as $key => $tabs)
                    @if ($key == 0)
                        <div class="carousel-item active">   
                    @else
                        <div class="carousel-item"> 
                    @endif
                            <div class="row">
                                @foreach ($tabs as $movie)
                                <div class="col-sm-6 col-md text-center">
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
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselCat{{$category}}Indicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselCat{{$category}}Indicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <div class="row separator azure mt-5 mx-5"></div>
            </div>
        </article>
    @empty
        <p class="text-center azure font-alfa mt-5">{{ __('Votre collection est vide') }}</p>
    @endforelse
</section>
@include('Flooflix.layouts.footer')
@include('Flooflix.layouts.varJS')
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/homeScript.js"></script>
@endsection