@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article role="main" class="container azure font-alfa">
    <header>
    <h1 class="mt-5 separator">{{ "Informations sur l'utilisateur " . ucfirst($user->last_name) . ' ' . ucfirst($user->first_name) }}</h1>
    </header>
    <div class="row mt-5">
        <div class="col table-responsive">
            <table class="table table-light table-bordered black">
                <thead>
                    <tr>
                        <th>LOGIN</th>
                        <th>NOM</th>
                        <th>PRENOM</th>
                        <th>MAIL</th>
                        <th>DATE DE NAISSANCE</th>
                        <th>CARTE BANCAIRE</th>
                        <th>DATE D'INSCRIPTION</th>
                        <th>CREDITS</th>
                        <th>TOTAL ACHATS</th>
                    </tr>
                </thead>
                <tbody>   
                    <tr>
                        <td>{{$user->login}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->birth_date}}</td>
                        <td>{{strtoupper($bank_card)}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->credits}}</td>
                        <td>{{$user->getTotalSales()}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row separator-top mt-4 justify-content-center"></div>
    <div class="row mt-5">
        <div class="col table-responsive">
            <table class="table table-light table-bordered black">
                <thead>
                    <tr>
                        <th>TITRE</th>
                        <th>DATE D'ACHAT</th>
                        <th>PRIX D'ACHAT</th>
                        <th>NOTE ATTRIBUEE</th>
                    </tr>
                </thead>
                <tbody>   
                    @forelse ($movies as $movie)
                    <tr>
                        <td>{{$movie->movie}}</td>
                        <td>{{$movie->date}}</td>
                        <td>{{$movie->price}}</td>
                        <td>{{$movie->grade}}</td>
                    </tr>    
                    @empty
                        <tr><td>Pas de films achetés</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div> 
    <div class="row">
        <a href="{{ route('user.delete',$user) }}" class="azure hover-red" id="delete-user">Supprimer cet utilisateur</a>
    </div>
</article>
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/script.js"></script>
@endsection