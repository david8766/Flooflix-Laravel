@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article role="main" class="container azure font-alfa">
    @include('Flooflix.partials.message')
    <header>
    <h1 class="mt-5 separator">La police "{{ $font->name }}"</h1>
    </header>
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
                        <td colspan="5">Cliquer sur un élément pour le modifier</td>
                    </tr>  
                    @if (!is_null($font))
                    <tr>
                        <td>
                            @switch(!is_null($font->style))
                                @case($font->style == 'Alfa Slab One')
                                    {{"police de base"}}
                                    @break
                                @case($font->style == "Anton")
                                    {{"police de base"}}
                                    @break
                                @default
                                    <a href="{{ route('edit.font.name',$font) }}" class="black hover-red" style="font-family: {{ $font->style }}">{{$font->name}}</a>
                            @endswitch
                        </td>
                        <td style="font-family: {{ $font->style }}">
                            {{$font->link}}
                        </td>
                        <td style="font-family: {{ $font->style }}">
                            {{$font->style}}
                        </td>
                        <td style="font-family: {{ $font->style }}">Exemple de texte: Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque eligendi suscipit temporibus possimus maxime debitis natus illum voluptatem repellat, deserunt corporis alias doloribus adipisci sapiente? Quae beatae voluptatum odio fugiat?
                        </td>
                        <td>
                            @switch(!is_null($font->style))
                                @case($font->style == 'Alfa Slab One')
                                    {{"police de base"}}
                                    @break
                                @case($font->style == "Anton")
                                    {{"police de base"}}
                                    @break
                                @default
                                    <a href="{{ action('FontController@deleteFont',$font) }}" class="black font-alfa hover-red">Supprimer</a>  
                            @endswitch
                        </td>
                    </tr>
                    @else
                    <tr><td>Pas d'images enregistrée</td></tr>
                    @endif
                </tbody>
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
@endsection