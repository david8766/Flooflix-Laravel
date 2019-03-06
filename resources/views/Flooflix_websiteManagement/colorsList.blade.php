@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article role="main" class="container azure font-alfa">
    @include('Flooflix.partials.message')
    <header>
        <h1 class="mt-5 separator">Liste des couleurs</h1>
    </header>
    <div class="row mt-2"><a href="{{route('create.color')}}" class="azure hover-red">Ajouter une couleur</a></div>
    <div class="row mt-5">
        <div class="col table-responsive">
            <table class="table table-light table-bordered black">
                <thead>
                    <tr>
                        <th>NOM</th>
                        <th>CODE RGB</th>
                        <th>OPACITE</th>
                        <th>APERCU</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">Cliquer sur le nom de la couleur pour modifier le contenu</td>
                    </tr>
                    @foreach ($colors as $color)      
                    @if (!is_null($color))
                    <tr>       
                        <td>
                            <a href="{{ route('color.informations',$color) }}" class="font-alfa black hover-red">
                                {{ $color->name }}
                            </a>
                        </td>
                        <td>{{ __($color['rgb']) }}</td>
                        <td>{{ __($color['opacity']) }}</td>
                        <td><div style="height: 3rem; width: 5rem; background-color: {{ $color['rgb'] }}; opacity: {{ $color['opacity'] }}"></div></td>
                        <td>
                            <a href="{{ action('ColorController@deleteColor',$color) }}" class="black font-alfa hover-red">Supprimer</a>
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
                    @if ($colors->currentPage() != 1)
                    <li class="page-item"><a class="page-link black hover-red" href="{{ $colors->previousPageUrl() }}">Précédent</a></li>
                    @if ($colors->currentPage() >2)
                       <li class="page-item"><a class="page-link black hover-red" href="{{ $colors->url(1) }}">1</a></li>  
                    @endif
                    <li class="page-item"><a class="page-link black hover-red" href="{{ $colors->previousPageUrl() }}">{{$colors->currentPage()-1}}</a></li>    
                    @endif
                    <li class="page-item"><a class="page-link red" href="{{ $colors->url($colors->currentPage()) }}">{{$colors->currentPage()}}</a></li>
                    @if ($colors->currentPage() != $colors->lastPage())
                        @if ($colors->currentPage() != ($colors->lastPage()-1))
                        <li class="page-item"><a class="page-link black" id="hover-red" href="{{ $colors->nextPageUrl() }}">{{$colors->currentPage()+1}}</a></li>             
                        @endif
                    <li class="page-item"><a class="page-link black" id="hover-red" href="{{ $colors->url($colors->lastPage()) }}">{{$colors->lastPage()}}</a></li>
                    @endif
                    <li class="page-item"><a class="page-link black" id="hover-red" href="{{ $colors->nextPageUrl() }}">Suivant</a></li>
                </ul>
            </nav>
        </div>
    </div>    
    @endif
</article>
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/script.js"></script>
@endsection