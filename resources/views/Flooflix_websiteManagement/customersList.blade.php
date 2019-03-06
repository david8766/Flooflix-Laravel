@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article role="main" class="container azure font-alfa">
    <header>
        <h1 class="mt-5 separator">Liste des utilisateurs</h1>
    </header>
    <div class="row mt-5">
        <div class="col table-responsive">
            <table class="table table-light table-bordered black">
                <thead>
                    <tr>
                        <th colspan="8">Cliquez sur le login d'un utilisateur pour voir ces informations</th>
                    </tr>
                    <tr>
                        <th>LOGIN</th>
                        <th>NOM</th>
                        <th>PRENOM</th>
                        <th>DATE D'ACHAT</th>
                        <th>PRIX D'ACHAT</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <td>
                        <a href="{{ route('user.informations',$user['user']) }}" class="black hover-red">{{$user['user']->login}}</a>
                        </td>
                        <td>{{$user['user']->last_name}}</td>
                        <td>{{$user['user']->first_name}}</td>
                        <td>{{$user['date']}}</td>
                        <td>{{$user['price']}}</td>
                    </tr>
                        @empty
                            <td colspan="5">Aucun client pour ce film</td>
                        @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <a href="/ListeDesFilms" class="azure hover-red">Retour à la liste des films</a>

    @if (count($users) > 8)
    <div class="row separator-top mt-5 justify-content-center">
        <div class="col col-auto mt-3">
            <nav aria-label="Navigation">
                <ul class="pagination text-center" role="navigation">
                    @if ($users->currentPage() != 1)
                    <li class="page-item"><a class="page-link black hover-red" href="{{ $users->previousPageUrl() }}">Précédent</a></li>
                    @if ($users->currentPage() >2)
                       <li class="page-item"><a class="page-link black hover-red" href="{{ $users->url(1) }}">1</a></li>  
                    @endif
                    <li class="page-item"><a class="page-link black hover-red" href="{{ $users->previousPageUrl() }}">{{$users->currentPage()-1}}</a></li>    
                    @endif
                    <li class="page-item"><a class="page-link red" href="{{ $users->url($users->currentPage()) }}">{{$users->currentPage()}}</a></li>
                    <li class="page-item"><a class="page-link black hover-red" href="{{ $users->nextPageUrl() }}">{{$users->currentPage()+1}}</a></li>
                    @if ($users->currentPage() != $users->lastPage())
                        @if ($users->currentPage() != ($users->lastPage()-1))
                        <li class="page-item"><a class="page-link black hover-red" href="{{ $users->nextPageUrl() }}">{{$users->currentPage()+1}}</a></li>             
                        @endif
                    <li class="page-item"><a class="page-link black hover-red" href="{{ $users->url($users->lastPage()) }}">{{$users->lastPage()}}</a></li>
                    @endif
                    <li class="page-item"><a class="page-link black hover-red" href="{{ $users->nextPageUrl() }}">Suivant</a></li>
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
