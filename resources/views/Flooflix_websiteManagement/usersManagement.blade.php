@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article role="main" class="container font-alfa azure">
@include('Flooflix.partials.message')  
        <h1 class="mt-5 separator">Gestion des utilisateurs</h1>
        <h2 class="mt-4">Statistiques :</h2>
        <ul>
        <li class="mt-4">Nombre total d'utilisateurs : {{ $total_users }}</li>
        <li class="mt-4">Nombre total de clients : {{ $total_customers }}</li>
            <div class="row mt-4">
                <li>Total des ventes pour l'année</li>
                    <form action="{{ action('UserController@usersManagement') }}" method="POST">
                        @csrf
                        <input type="number" value="{{$year}}" min="2018" max="9999" name="year" class="form-control-sm ml-2">
                        <button type="submit" class="btn btn-danger btn-sm">OK</button>
                    </form>
                    <p class="ml-2">: {{$total_year->total}} <i class="fas fa-euro-sign"></i></p>    
            </div>
            <div class="row mt-3">
                <li>Total des ventes pour le mois de</li>
                    <form action="{{ action('UserController@usersManagement') }}" method="POST">
                        @csrf
                        <input type="month" value="{{$year2.'-'.$month2}}" name="month"  class="form-control-sm ml-2">
                        <button type="submit" class="btn btn-danger btn-sm">OK</button>
                    </form> 
                <p class="ml-2">: {{$total_month->total}}  <i class="fas fa-euro-sign"></i></p>
            </div>
            <div class="row mt-3">
                <li>Total des ventes pour ce jour</li>
                    <form action="{{ action('UserController@usersManagement') }}" method="POST">
                        @csrf
                        <input type="date" value="{{ $year3.'-'.$month3.'-'.$day}}" name="day"  class="form-control-sm ml-2">
                        <button type="submit" class="btn btn-danger btn-sm">OK</button>
                    </form> 
                <p class="ml-2">: {{$total_day->total}}  <i class="fas fa-euro-sign"></i></p>
            </div>
        </ul>
    <h2><a href="{{ route('users.list') }}" class="azure hover-red">Voir la liste des utilisateurs</a></h2>
        <div class="row">
            <p class="text-left mt-3"><i class="fas fa-arrow-circle-right"></i> Rechercher un utilisateur</p>
            <form action="{{ action('UserController@addUserByResearch') }}" class="form-inline my-2 my-lg-0 ml-3" role="search" method="POST">
                @csrf
                <input class="form-control-md mr-sm-2" type="text" name="search" placeholder="Prénom Nom" aria-label="Search">
                <button class="btn btn-outline-danger btn-md my-2 my-sm-0 ml-2" type="submit">Rechercher</button>
            </form>
        </div>  
</article>
@include('Flooflix.layouts.scripts')
<script>
    $('document').ready(function() {
        document.body.style.backgroundColor = 'black';
    })
</script>
@endsection