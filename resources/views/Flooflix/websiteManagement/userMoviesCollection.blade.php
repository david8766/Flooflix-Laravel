@extends('Flooflix.websiteManagement.layouts.base')
@section('content')
@include('Flooflix.websiteManagement.layouts.header')
<!-- Main -->
<article class="container azure font-alfa mt-5" role="main">
    <header>
        <h1>Collection de films de "Nom prénom"</h1>
    </header>
    <div class="row mt-5">
        <div class="col table-responsive mb-4">
            <table class="table table-light table-bordered black">
                <thead>
                    <tr>
                        <th>TITRE</th>
                        <th>CATEGORIE</th>
                        <th>DATE D'ACHAT</th>
                        <th>PRIX D'ACHAT</th>
                        <th>NOTE ATTRIBUEE</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($movies as $movie)
                    <tr>
                        <td>{{$movie->title}}</td>
                        <td>{{$movie->date}}</td>
                        <td>{{$movie->price}}</td>
                        <td>{{$movie->grade}}</td>
                    </tr>
                        
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <a href="/listeDesUtilisateurs" class="azure" id="hover-red">Retour à la liste des utilisateurs</a>
    <div class="row separator-top mt-5 justify-content-center">   
        <div class="col col-auto mt-3">
            <nav aria-label="Navigation">
                <ul class="pagination text-center">
                    <li class="page-item disabled"><a class="page-link" href="#">Précédent</a></li>
                    <li class="page-item"><a class="page-link" href="">1</a></li>
                    
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