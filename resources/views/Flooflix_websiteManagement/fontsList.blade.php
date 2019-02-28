@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article role="main" class="container azure font-alfa">
    <header>
        <h1 class="mt-5 separator">Liste des polices</h1>
    </header>
    <div class="row mt-2">
        <a href="AjouterUnePolice" class="azure hover-red">Ajouter une police</a>
    </div>
    <div class="row mt-5">
        <div class="col table-responsive">
            <table class="table table-light table-bordered black">
                <thead>
                    <tr>
                        <th>NOM</th>
                        <th>LIEN</th>
                        <th>STYLE</th>
                        <th>EXEMPLE</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">Cliquer sur le nom de la couleur pour modifier le contenu</td>
                    </tr>
                    @foreach ($fonts as $font)      
                    @if (!is_null($font))
                    <tr>       
                        <td>
                            <a href="{{ route('font.informations',$font) }}" class="black hover-red" style="font-family: {{ $font->style }}">
                                {{ $font->name }}
                            </a>
                        </td>
                        <td style="font-family: {{ $font->style }}">
                            {{$font->link}}
                        </td>
                        <td style="font-family: {{ $font->style }}">
                            {{$font->style}}
                        </td>
                        <td style="font-family: {{ $font->style }}, cursive; ">Exemple de texte: Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque eligendi suscipit temporibus possimus maxime debitis natus illum voluptatem repellat, deserunt corporis alias doloribus adipisci sapiente? Quae beatae voluptatum odio fugiat?
                        </td>
                        <td>
                            @if ($font->style != 'Alfa Slab One' && $font->style != "Anton")
                            <a href="{{ action('FontController@deleteFont',$font) }}" class="black font-alfa hover-red">Supprimer</a>   
                            @else
                                {{"police de base"}}
                            @endif
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
    @if ($total > 15)
    <div class="row separator-top mt-5 justify-content-center">
        <div class="col col-auto mt-3">
            <nav aria-label="Navigation">
                <ul class="pagination text-center" role="navigation">
                    @if ($fonts->currentPage() != 1)
                    <li class="page-item"><a class="page-link black hover-red" href="{{ $fonts->previousPageUrl() }}">Précédent</a></li>
                    @if ($fonts->currentPage() >2)
                       <li class="page-item"><a class="page-link black hover-red" href="{{ $fonts->url(1) }}">1</a></li>  
                    @endif
                    <li class="page-item"><a class="page-link black hover-red" href="{{ $fonts->previousPageUrl() }}">{{$fonts->currentPage()-1}}</a></li>    
                    @endif
                    <li class="page-item"><a class="page-link red" href="{{ $fonts->url($fonts->currentPage()) }}">{{$fonts->currentPage()}}</a></li>
                    @if ($fonts->currentPage() != $fonts->lastPage())
                        @if ($fonts->currentPage() != ($fonts->lastPage()-1))
                        <li class="page-item"><a class="page-link black" id="hover-red" href="{{ $fonts->nextPageUrl() }}">{{$fonts->currentPage()+1}}</a></li>             
                        @endif
                    <li class="page-item"><a class="page-link black" id="hover-red" href="{{ $fonts->url($fonts->lastPage()) }}">{{$fonts->lastPage()}}</a></li>
                    @endif
                    <li class="page-item"><a class="page-link black" id="hover-red" href="{{ $fonts->nextPageUrl() }}">Suivant</a></li>
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