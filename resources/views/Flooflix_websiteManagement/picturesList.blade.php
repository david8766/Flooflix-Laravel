@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article role="main" class="container azure font-alfa">
    @include('Flooflix.partials.message')
    <header>
        <h1 class="mt-5 separator">Liste des images</h1>
    </header>
    <div class="row mt-3">
        <a href="/AjouterUneImage" class="azure hover-red">Ajouter une image</a>
    </div>
    <div class="row mt-5">
        <div class="col table-responsive">
            <table class="table table-light table-bordered black">
                <thead>
                    <tr>
                        <th>NOM</th>
                        <th>IMAGE</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3">Cliquer sur un élément pour le nom de l'image pour modifier les informations</td>
                    </tr>
                    @foreach ($pictures as $picture)      
                    @if (!is_null($picture))
                    <tr>       
                        <td>
                            <a href="{{ route('picture.informations',$picture) }}" class="font-alfa black hover-red">
                                {{ $picture->name }}
                            </a>
                        </td>
                        <td><img src="{{ asset($picture->style) }}" alt="{{ $picture->name }}" class="img-fluid figure-img"></td>
                        <td>
                            <a href="{{ action('PictureController@deletePicture',$picture) }}" class="black font-alfa hover-red">Supprimer</a>
                        </td>
                    </tr>
                    @else
                    <tr><td>Pas d'images enregistrée</td></tr>
                    @endif
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    @if ($total > 5)
    <div class="row separator-top mt-5 justify-content-center">
        <div class="col col-auto mt-3">
            <nav aria-label="Navigation">
                <ul class="pagination text-center" role="navigation">
                    @if ($pictures->currentPage() != 1)
                    <li class="page-item"><a class="page-link black hover-red" href="{{ $pictures->previousPageUrl() }}">Précédent</a></li>
                    @if ($pictures->currentPage() >2)
                       <li class="page-item"><a class="page-link black hover-red" href="{{ $pictures->url(1) }}">1</a></li>  
                    @endif
                    <li class="page-item"><a class="page-link black hover-red" href="{{ $pictures->previousPageUrl() }}">{{$pictures->currentPage()-1}}</a></li>    
                    @endif
                    <li class="page-item"><a class="page-link red" href="{{ $pictures->url($pictures->currentPage()) }}">{{$pictures->currentPage()}}</a></li>
                    @if ($pictures->currentPage() != $pictures->lastPage())
                        @if ($pictures->currentPage() != ($pictures->lastPage()-1))
                        <li class="page-item"><a class="page-link black" id="hover-red" href="{{ $pictures->nextPageUrl() }}">{{$pictures->currentPage()+1}}</a></li>             
                        @endif
                    <li class="page-item"><a class="page-link black" id="hover-red" href="{{ $pictures->url($pictures->lastPage()) }}">{{$pictures->lastPage()}}</a></li>
                    @endif
                    <li class="page-item"><a class="page-link black" id="hover-red" href="{{ $pictures->nextPageUrl() }}">Suivant</a></li>
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