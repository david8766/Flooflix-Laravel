@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article role="main" class="container azure font-alfa">
    @include('Flooflix.partials.message')
    <header>
    <h1 class="mt-5 separator">La couleur "{{ $color->name }}"</h1>
    </header>
    <div class="row mt-5">
        <div class="col table-responsive">
            <table class="table table-light table-bordered black">
                <thead>
                    <tr>
                        <th>NOM</th>
                        <th>CODE RBG</th>
                        <th>OPACITE</th>
                        <th>APERCU</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">Cliquer sur un élément pour le modifier</td>
                    </tr>  
                    @if (!is_null($color))
                    <tr>       
                        <td>
                            <a href="{{ route('edit.color.name',$color) }}" class="font-alfa black hover-red">
                                {{ $color->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('edit.color.rgb',$color) }}" class="font-alfa black hover-red">
                                {{ $color->rgb }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('edit.color.opacity',$color) }}" class="font-alfa black hover-red">
                                {{ $color->opacity }}
                            </a>
                        </td>
                        <td><div style="height: 3rem; width: 5rem; background-color: {{ $color['rgb'] }}; opacity: {{ $color['opacity'] }}"></div></td> 
                        <td>
                            <a href="{{ action('ColorController@deleteColor',$color) }}" class="black font-alfa hover-red">Supprimer</a>
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