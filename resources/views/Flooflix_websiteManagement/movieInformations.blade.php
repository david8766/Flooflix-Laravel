@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
@include('Flooflix.partials.message')
<article class="container-fluid azure font-alfa mt-5">
    <header>
    <h1 class="ml-5">Informations sur le film :</h1>
    </header>
    <div class="row mt-5"> 
        <div class="col-4 table-responsive">
            <table class="table table-light table-bordered black">
                <thead>
                    <tr>
                        <th>Affiche</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pictures as $picture)
                        @if ($movie->picture_id == $picture->id)
                        <tr>
                            <td>
                                <img width="400px" height="500px" src="{{ asset($picture->style) }}" alt="{{ $movie->title }}" class="figure-img">
                            </td>    
                        </tr>
                        @endif
                    @endforeach  
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">
                            <a href="{{route('edit.movie.poster',$movie)}}" class="black" id="hover-red">Modifier l'image</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-light table-bordered black">
                        <thead>
                            <tr>
                                <th>Catégorie</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                @foreach ($categories as $category)
                                        @if ($category->id == $movie->category_id )
                                            {{ __($category->genre) }}
                                        @else
                                            {{''}}
                                        @endif
                                @endforeach
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">
                                    <a href="{{route('edit.movie.category',$movie)}}" class="black" id="hover-red">Modifier la catégorie</a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-light table-bordered black">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Durée</th>
                                <th>Date de sortie</th>
                                <th>Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="{{route('edit.movie.title',$movie)}}" class="black" id="hover-red">{{$movie->title}}</a>
                                </td>
                                <td>
                                    <a href="{{route('edit.movie.duration',$movie)}}" class="black" id="hover-red">{{$movie->duration}}</a>
                                </td>
                                <td>
                                    <a href="{{route('edit.movie.releaseDate',$movie)}}" class="black" id="hover-red">{{$movie->release_date}}</a>
                                </td>
                                <td>
                                    <a href="{{route('edit.movie.price',$movie)}}" class="black" id="hover-red">{{$movie->price}}</a>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">Cliquer sur un des éléments pour le modifier</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row">     
                <div class="col table-responsive">
                    <table class="col-12 table table-light table-bordered black">
                        <thead>
                            <tr>
                                <th>Synopsis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$movie->synopsis}}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                                <tr>
                                    <td colspan="2">
                                    <a href="{{ route('edit.movie.synopsis',$movie) }}" class="black" id="hover-red">Modifier le synopsis</a>
                                    </td>
                                </tr>
                            </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>    
    <div class="row mt-5">     
        <div class="col-12 table-responsive">
            <table class="table table-light table-bordered black">
                <thead>
                    <tr>
                        <th>Réalisateur(s) / Réalisatrice(s)</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $film_directors = $movie->getFilmDirectors();
                        $film_directors_and_actors = $movie->getFilmDirectorsAndActors();
                        $people = $movie->people()->get();
                    @endphp
                    @foreach ($film_directors as $film_director)
                        <tr>
                            @foreach ($people as $person)
                                @if ($person->id == $film_director->person_id)
                                <td>
                                    {{ $person->first_name . ' ' . $person->last_name}}
                                </td>
                                <td>
                                    <a href="{{ route('edit.movie.person',[$movie,$person]) }}" class="black" id="hover-red">Modifier</a>
                                </td>
                                <td>
                                    <a href="{{ route('delete.movie.filmDirector',[$movie,$person]) }}" class="black" id="hover-red">Supprimer</a>
                                </td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach     
                    @foreach ($film_directors_and_actors as $film_director_and_actor)
                        <tr>
                            @foreach ($people as $person)
                                @if ($person->id == $film_director_and_actor->person_id)
                                <td>
                                    {{ $person->first_name . ' ' . $person->last_name}}
                                </td>
                                <td>
                                    <a href="{{ route('edit.movie.person',[$movie,$person]) }}" class="black" id="hover-red">Modifier</a>
                                </td>
                                <td>
                                    <a href="{{ route('delete.movie.filmDirector',[$movie,$person]) }}" class="black" id="hover-red">Supprimer</a>
                                </td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach     
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">
                        <a href="{{ route('add.movie.filmDirector',$movie) }}" class="black" id="hover-red">Ajouter un réalisateur/réalisatrice</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row mt-5">     
        <div class="col table-responsive">
            <table class="table table-light table-bordered black">
                <thead>
                    <tr>
                        <th>Acteur(s) et actrice(s)</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $actors = $movie->getActors();
                        $people = $movie->people()->get();
                    @endphp
                    @foreach ($actors as $actor)
                        <tr>
                            @foreach ($people as $person)
                            @if ($person->id == $actor->person_id)
                                <td>
                                    {{ $person->first_name . ' ' . $person->last_name}}
                                </td>
                                <td>
                                    <a href="{{ route('edit.movie.person',[$movie,$person]) }}" class="black" id="hover-red">Modifier</a>
                                </td>
                                <td>
                                    <a href="{{ route('delete.movie.actor',[$movie,$person]) }}" class="black" id="hover-red">Supprimer</a>
                                </td>
                            @endif
                            @endforeach
                        </tr>
                    @endforeach
                    @foreach ($film_directors_and_actors as $film_director_and_actor)
                        <tr>
                            @foreach ($people as $person)
                                @if ($person->id == $film_director_and_actor->person_id)
                                <td>
                                    {{ $person->first_name . ' ' . $person->last_name}}
                                </td>
                                <td>
                                    <a href="{{ route('edit.movie.person',[$movie,$person]) }}" class="black" id="hover-red">Modifier</a>
                                </td>
                                <td>
                                    <a href="{{ route('delete.movie.filmDirector',[$movie,$person]) }}" class="black" id="hover-red">Supprimer</a>
                                </td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach   
                    <tr>
                        <td colspan="3">
                            <a href="{{ route('add.movie.actor',$movie) }}" class="black" id="hover-red">Ajouter un acteur/actrice</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-5">     
        <div class="col table-responsive">
            <table class="table table-light table-bordered black">
                <thead>
                    <tr>
                        <th>Lien de la bande annonce</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <code>{!!$movie->link_trailer!!}</code>
                        </td>            
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">
                            <a href="{{ route('edit.movie.trailerLink',$movie) }}" class="black" id="hover-red">Modifier le lien</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row mt-5">     
        <div class="col table-responsive">
            <table class="table table-light table-bordered black">
                <thead>
                    <tr>
                        <th>Lien de la video</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>{!!$movie->link_movie!!}</code></td>      
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">
                            <a href="{{ route('edit.movie.movieLink',$movie) }}" class="black" id="hover-red">Modifier le lien</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</article>

@include('Flooflix.layouts.scripts')
<script>
    $('document').ready(function() {
        document.body.style.backgroundColor = 'black';
    })
</script>