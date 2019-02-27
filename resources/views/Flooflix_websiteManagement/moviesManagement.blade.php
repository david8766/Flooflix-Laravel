@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article role="main" class="container font-alfa azure" role="main">
    <h1 class="mt-5 separator">Gestion des films</h1>
    <h2 class="mt-4"><u>Statistiques :</u></h2>
    <ul>
    <li class="mt-4">Nombre total de films : {{count($movies)}}</li>
    <li class="mt-4">Total des bénéfices : {{$total_sales}} <i class="fas fa-euro-sign"></i></li>
    @foreach ($top_copies as $key => $value)
        <li class="mt-4">Film le plus vendu : "{{$key}}" avec {{$top_copies[$key]['total_copies']}} exemplaires pour un total de bénéfices de {{$top_copies[$key]['total_sales']}} <i class="fas fa-euro-sign"></i></li>
    @endforeach
    @foreach ($min_copies as $key => $value)
        <li class="mt-4">Film le moins vendu : "{{$key}}" avec {{$min_copies[$key]['total_copies']}} exemplaires pour un total de bénéfices de {{$min_copies[$key]['total_sales']}} <i class="fas fa-euro-sign"></i></li>
    @endforeach
    </ul>
    <h2><u>Statistiques par catégories</u></h2> 
    <h4 class="ml-2 mt-3">Pour la catégorie:</h3>
    <form action="{{ action('MovieController@moviesManagement') }}" method="POST" class="mt-2">
        @csrf
            <select name="category" class="form-control-sm ml-2">
                @foreach ($categories as $value)
                <option value="{{ $value->id }}">{{ __($value->genre) }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-danger btn-sm">OK</button>
        </div>
    </form>
    <ul>
        <li class="mt-4">Nombre total de films : {{count($movies_by_category)}}</li>
        <li class="mt-4">Total de bénéfices pour cette catégorie : {{$total_sales_by_category}} <i class="fas fa-euro-sign"></i></li>
        @foreach ($top_copies_by_category as $key => $value)
        <li class="mt-4">Film le plus vendu : "{{$key}}" avec {{$top_copies_by_category[$key]['total_copies']}} exemplaires pour un total de bénéfices de {{$top_copies_by_category[$key]['total_sales']}} <i class="fas fa-euro-sign"></i></li>   
        @endforeach
        @foreach ($min_copies_by_category as $key => $value)
        <li class="mt-4">Film le moins vendu : "{{$key}}" avec {{$min_copies_by_category[$key]['total_copies']}} exemplaires pour un total de bénéfices de {{$min_copies_by_category[$key]['total_sales']}} <i class="fas fa-euro-sign"></i></li>   
        @endforeach
    </ul>
    <h2 class="mt-4"><a href="/ListeDesFilms" class="azure" id="hover-red">Voir la liste des films</a></h2>
    <div class="row">
        <p class="text-left mt-3"><i class="fas fa-arrow-circle-right"></i> Rechercher un film</p>
        <form action="{{ action('MovieController@showMovieByResearchInWebsiteManagement') }}" class="form-inline my-2 my-lg-0 ml-3" role="search" method="POST">
            @csrf
            <input class="form-control-md mr-sm-2 margin-left-2" type="text" name="search" placeholder="titre du film" aria-label="Search">
            <button class="btn btn-outline-danger btn-md my-2 my-sm-0 ml-2" type="submit">Rechercher</button>
        </form>
    </div>
    <a href="AjouterUnFilm" class="azure" id="hover-red">Ajouter un film</a>
</article>
@include('Flooflix.layouts.scripts')
@include('Flooflix.layouts.varJS')
<script>
    $('document').ready(function() {
        document.body.style.backgroundColor = 'black';
    })
    var options = document.getElementsByTagName("option")
    for (const key in options) {
        if (options.hasOwnProperty(key)) {
            const element = options[key];
            var result = element.getAttribute('value');
            if(result == varJS.category){
                element.setAttribute('selected','selected');
            }
        }
    }   
</script>
@endsection