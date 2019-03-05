@extends('Flooflix.layouts.base')
@section('content')
@include('Flooflix.layouts.header')
@php
    $user = auth()->user('id');
    $total = 0;
@endphp
<!-- Main -->
<article role="main" class="container-fluid bg-black pb-5 min-100">
    @include('Flooflix.partials.message')
    <div class="row separator azure mx-5">
        <header>
            <h1 class="font-alfa azure mt-5">Votre sélection</h1>
        </header>
    </div>

    <!-- First container -->
    <div class="row mx-5 mt-5 bg-black border-azure">
        <div class="col-xl-8 mt-5 mb-5 align-self-center">
            <div class="row">
                @forelse ($shopping_cart as $movie)
                    <div class="col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ route('movie',[$movie->title]) }}" class="azure hover-coral">
                                    <figure class="figure">
                                        @foreach ($pictures as $picture)
                                            @if ($picture->id == $movie->picture_id)
                                            <img width="150px" height="250px" src="{{ asset($picture->style) }}" alt="{{ $movie->title }}" class="img-fluid figure-img">
                                            @endif
                                        @endforeach               
                                    </figure>
                                </a>
                            </div>
                            <div class="col-6 align-self-center">
                                <p class="font-alfa azure">{{$movie->title}}</p>
                                <p class="font-alfa azure">{{'Prix: '.$movie->price}} <i class="fas fa-euro-sign"></i></p>   
                            <p><a href="{{ route('remove.movie.in.cart',[$movie,$user]) }}" class="azure hover-coral">Retirer du panier</a></p>
                            </div>
                        </div>
                    </div>           
                @empty
                    <p class="azure font-alfa">Votre panier est vide</p>
                @endforelse
            </div>
        </div>

        <!-- Second container-->
        <div class="col-xl-4 mt-5 mb-5">
            <div class="row bg-black border-azure justify-content-center">
                <div class="col mt-3">
                    <p class="font-alfa azure">{{$user->last_name . ' ' . $user->first_name}}</p>
                    <p class="font-alfa azure">{{'Numéro de carte : N°' . substr(decrypt($bankCard->number),0,4) .'-'. substr(decrypt($bankCard->number),4,4).'-XXXX-XXXX'}}</p>
                    <hr height=1px class="bg-white">
                    @forelse ($shopping_cart as $movie)  
                        <div class="row">
                            <div class="col-9 mt-2">
                                <p class="font-alfa azure">{{ucfirst(strtolower($movie->title))}}</p>
                            </div>
                            <div class="col-3 mt-2">
                                <p class="font-alfa azure">{{$movie->price}} <i class="fas fa-euro-sign"></i></p>
                            </div>
                        </div>
                        @php
                            $total += $movie->price;
                        @endphp       
                    @empty
                        <p class="azure font-alfa">Votre panier est vide</p>
                    @endforelse
                   
                    <hr height=1px class="bg-white">
                    <div class="row">
                        <div class="col-9 mt-2">
                            <p class="font-alfa azure">Total</p>
                        </div>
                        <div class="col-3 mt-2">
                            <p class="font-alfa azure">{{$total}} <i class="fas fa-euro-sign"></i></p>
                        </div>
                    </div>
                </div>
            </div>
            @if ($total > 0)
            <div class="row mt-4 justify-content-center">
                <div class="col col-auto">
                    <a href="{{ route('add.movie.to.collection') }}" class="btn btn-warning btn-lg">ACHETER</a>   
                </div>
            </div>     
            @endif
        </div>
    </div>
</article>

@include('Flooflix.layouts.footer')
@include('Flooflix.layouts.varJS')
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/homeScript.js"></script>
@endsection