@extends('Flooflix.layouts.base')
@section('content')
@include('Flooflix.layouts.header')

<!-- Main -->
@include('Flooflix.partials.message')
<section class="bg-black min-100" role="main">
    <div class="row mx-5">
        <aside class="col-lg-4 pt-5">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <figure class="figure margin-bottom-2">
                        @foreach ($pictures as $picture)
                            @if ($picture->id == $movie->picture_id)
                            <img width="400px" height="500px" src="{{ asset($picture->style) }}" alt="{{ $movie->title }}" class="figure-img">
                            @endif
                        @endforeach
                    </figure>
                    <div class="row">
                    <a class="font-alfa azure btn bg-dark" id="hover-coral" href="{{ route('add.movie.to.shoppingCart',$movie) }}" role="button">AJOUTER AU PANIER</a>     
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
        </aside>
        <article class="col-lg-8 pt-5 font-alfa">
            <header>
                <h1 class="font-alfa azure">{{ $movie->title }}</h1>
                <p class="font-alfa azure mt-2">De :
                    @foreach ($film_directors as $film_director)
                        @foreach ($people as $person)
                            @if ($person->id == $film_director->person_id)
                                {{ $person->first_name . ' ' . $person->last_name . ', '}}
                            @endif
                        @endforeach
                    @endforeach
                </p>
                <p class="font-alfa azure mt-2">{{ __('Date de sortie : '. $movie->release_date) }}</p>
                <p class="font-alfa azure">Avec :
                    @foreach ($actors as $actor)
                        @foreach ($people as $person)
                            @if ($person->id == $actor->person_id)
                                {{ "Avec : " . $person->first_name . ' ' . $person->last_name . ', '}}
                            @endif
                        @endforeach
                    @endforeach
                </p>
                @foreach ($categories as $category)
                    @if ($category->id == $movie->category_id)
                        <p class="font-alfa azure">{{'HD  '. $movie->duration .' / ' . $category->genre}}</p>    
                    @endif
                @endforeach
            </header>
            <h3 class="font-alfa azure mt-2">Synopsis :</h3>
            <p class="font-alfa azure mt-2">
                {{ $movie->synopsis }}
            </p>
            <footer class="mt-2">
                <p class="font-alfa azure">{{ __('Notes des spectateurs :')}}
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </p>
                <p class="font-alfa azure">{{'Prix : ' . $movie->price }}<i class="fas fa-euro-sign"></i></p>
                <p class="font-alfa azure">{{ __('Voir la bande annonce :')}}</p>
                {!!$movie->link_trailer!!}         
            </footer>
        </article>
    </div>
</section>
@include('Flooflix.layouts.footer')
@include('Flooflix.layouts.varJS')
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/homeScript.js"></script>
@endsection
