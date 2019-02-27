@extends('Flooflix.websiteManagement.layouts.base')
@section('content')
@include('Flooflix.websiteManagement.layouts.header')
<!-- Main -->
<article role="main" class="container azure font-alfa">
    <header>
        <h1 class="mt-5 separator">Liste des images</h1>
    </header>
    <div class="row mt-5">
        <div class="col table-responsive">
            <table class="table table-light table-bordered black">
                <thead>
                    <tr>
                        <th>NOM</th>
                        <th>IMAGE</th>
                        <th colspan="2">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pictures as $picture)      
                    @if (!is_null($picture))
                    <tr>       
                        <td class="font-alfa black">{{ $picture->name }}</td>
                        <td>
                            <div class="image" style="background-image: url('{{asset($picture['style'])}}"></div>
                        </td>
                        <td>
                            <a href="" class="black font-alfa" id="hover-red">Modifier</a>
                        </td>
                        <td>
                            <a href="" class="black font-alfa" id="hover-red">Supprimer</a>
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
    <a href="/AjouterUneImage" class="azure" id="hover-red">Ajouter une image</a>
    <div class="row separator-top mt-4 justify-content-center">
        <div class="col col-auto mt-4">
            <nav aria-label="Navigation">
                <ul class="pagination text-center">
                    <li class="page-item disabled"><a class="page-link" href="#">Précédent</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                </ul>
            </nav>
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