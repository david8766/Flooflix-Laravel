@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article role="main" class="container azure font-alfa">
    @include('Flooflix.partials.message')
    <header>
    <h1 class="mt-5 separator">L'image "{{ $picture->name }}"</h1>
    </header>
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
                        <td colspan="3">Cliquer sur un élément pour le modifier</td>
                    </tr>  
                    @if (!is_null($picture))
                    <tr>       
                        <td>
                            <a href="{{ route('edit.picture.name',$picture) }}" class="font-alfa black hover-red">
                                {{ $picture->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('edit.picture.visual',$picture) }}">
                                <img src="{{ asset($picture->style) }}" alt="{{ $picture->name }}" class="img-fluid figure-img">
                            </a>
                        </td>
                        <td>
                            <a href="{{ action('PictureController@deletePicture',$picture) }}" class="black font-alfa hover-red">Supprimer</a>
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