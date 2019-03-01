@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article class="container azure font-alfa mt-5 pl-4">
    @include('Flooflix.partials.message')
    <header>
        <h1>Liste des catégories</h1>
    </header>
    <div class="row mt-3">
        <a href="{{ route('create.category')}}" class="azure hover-red">Ajouter une catégorie</a>
    </div>
    <div class="row mt-5 mb-4">
        <div class="table-responsive px-5">
            <table class="table table-light table-bordered black font-size1">
                <thead>
                    <tr>
                        <th>GENRE</th>
                        <th>IMAGE</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>       
                        <td> 
                            <a href="{{ route('category.informations',$category) }}" class="black hover-red">{{ $category->genre }}</a> 
                        </td>
                        <td> 
                            <figure class="figure">            
                                @foreach ($pictures as $picture)
                                    @if ($picture->id == $category->picture_id)    
                                        <img height="300px" width="500px" src="{{ asset($picture->style) }}" alt="{{ $category->genre }}" class="figure-img">
                                    @endif  
                                @endforeach
                            </figure>
                        </td>
                        <td>
                            <a href="{{ action('CategoryController@deleteCategory',$category) }}" class="black font-alfa hover-red">Supprimer</a>
                        </td>
                    </tr>                 
                    @endforeach
                </tbody>
            </table> 
        </div>
    </div>
    @if ($total > 10)
    <div class="row separator-top mt-5 justify-content-center">
        <div class="col col-auto mt-3">
            <nav aria-label="Navigation">
                <ul class="pagination text-center" role="navigation">
                    @if ($categories->currentPage() != 1)
                    <li class="page-item"><a class="page-link black hover-red" href="{{ $categories->previousPageUrl() }}">Précédent</a></li>
                        @if ($categories->currentPage() >2)
                        <li class="page-item"><a class="page-link black hover-red" href="{{ $categories->url(1) }}">1</a></li>  
                        @endif
                    <li class="page-item"><a class="page-link black hover-red" href="{{ $categories->previousPageUrl() }}">{{$categories->currentPage()-1}}</a></li>    
                    @endif
                    <li class="page-item"><a class="page-link red" href="{{ $categories->url($categories->currentPage()) }}">{{$categories->currentPage()}}</a></li>
                    @if ($categories->currentPage() != $categories->lastPage())
                        @if ($categories->currentPage() != ($categories->lastPage()-1))
                        <li class="page-item"><a class="page-link black hover-red" href="{{ $categories->nextPageUrl() }}">{{$categories->currentPage()+1}}</a></li>             
                        @endif
                    <li class="page-item"><a class="page-link black hover-red" href="{{ $categories->url($categories->lastPage()) }}">{{$categories->lastPage()}}</a></li>
                    @endif
                    <li class="page-item"><a class="page-link black hover-red" href="{{ $categories->nextPageUrl() }}">Suivant</a></li>
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