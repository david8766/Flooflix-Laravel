@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article class="container-fluid azure font-alfa mt-5 pl-4">
    @include('Flooflix.partials.message')
    <header>
        <h1>Liste des films</h1>
    </header>
    <a href="AjouterUnFilm" class="azure hover-red">Ajouter un film</a>
    <div class="row">
        <p class="text-left mt-3"><i class="fas fa-arrow-circle-right"></i> Rechercher un film</p>
        <form action="{{ action('MovieController@showMovieByResearchInWebsiteManagement') }}" class="form-inline my-2 my-lg-0 ml-3" role="search" method="POST">
            @csrf
            <input class="form-control-md mr-sm-2 margin-left-2" type="text" name="search" placeholder="titre du film" aria-label="Search">
            <button class="btn btn-outline-danger btn-md my-2 my-sm-0 ml-2" type="submit">Rechercher</button>
        </form>
    </div>
    <div class="row mt-5 mb-4">
        <div class="table-responsive px-5">
            <table class="table table-light table-bordered black font-size1">
                <thead>
                    <tr>
                        <th>TITRE</th>
                        <th>NOTE DES SPECTATEURS</th>
                        <th>PRIX</th>
                        <th>DATE D'AJOUT</th>
                        <th>TOTAL VENDUS</th>
                        <th>LISTE DES CLIENTS</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                    <tr>
                        <td>{{ $movie->title }}</td>
                        <td>
                            @foreach ($movies_grade as $key => $value)
                                @if ($movie->id == $key)
                                    @if (!is_null($value))
                                        @for ($i = 1; $i <= $value; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor     
                                    @else
                                        {{'Aucune note attribuée' }}
                                    @endif
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $movie->price }}</td>
                        <td>{{ $movie->created_at }}</td>
                        <td>{{ $movie->getTotalCopiesSold() }}</td>
                        <td> 
                            <a href="{{ route('customers.list',[$movie]) }}" class="black hover-red">Voir</a> 
                        </td>
                        <td>
                            <a href="{{ route('movie.informations',[$movie]) }}" class="black hover-red">Voir</a>
                        </td>
                    </tr>                 
                    @endforeach
                </tbody>
            </table> 
        </div>
    </div>
    @if ($movies->total() > 15)
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
@include('Flooflix.layouts.scripts')
<script>
    $('document').ready(function() {
        document.body.style.backgroundColor = 'black';
    })
</script>
@endsection