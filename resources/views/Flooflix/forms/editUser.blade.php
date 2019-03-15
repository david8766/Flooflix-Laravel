@extends('Flooflix.layouts.base')
@section('content')
@include('Flooflix.layouts.header')
<!-- Main -->
<article class="min-100 bg-black">
    @php
        $user = auth()->user('id');
    @endphp 
    <div class="container-fluid">
        <div class="row pt-5 pb-5">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 bg-white">
                @include('Flooflix.partials.message')
                <header class="mt-5 text-center">
                    <h1 id="title" class="font-alfa">Modifiez votre compte</h1>
                </header>
                <form action="{{ action('UserController@update', $user) }}" class="mt-5 mx-5" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="last_name" class="font-alfa">Nom</label>
                        <input type="text" name="last_name" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" value="{{$user->last_name }}" id="last_name">
                        @if ($errors->has('last_name'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('last_name')) }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="first_name" class="font-alfa">Prénom</label>
                        <input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" value="{{ $user->first_name }}" id="first_name">
                        @if ($errors->has('first_name'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('first_name')) }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email" class="font-alfa">Email</label>
                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $user->email }}" id="email">
                        @if ($errors->has('email'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('email')) }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="login" class="font-alfa">Login</label>
                        <input type="text" name="login" class="form-control {{ $errors->has('login') ? ' is-invalid' : '' }}" value="{{ $user->login }}" id="login">
                        @if ($errors->has('login'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('login')) }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password" class="font-alfa">Mot de passe</label>
                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password">
                        @if ($errors->has('password'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('password')) }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="birth_date" class="font-alfa">Date de naissance</label>
                        <input type="date" name="birth_date" class="form-control {{ $errors->has('birth_date') ? ' is-invalid' : '' }}" value="{{ $user->birth_date }}" id="birth-date">
                        @if ($errors->has('birth_date'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('birth_date')) }}</p>
                        @endif
                    </div>
                    <div class="row mt-5 justify-content-center">                        
                        <div class="col col-auto">
                            <button type="submit" class="btn btn-warning btn-md font-alfa">Modifier</button>
                        </div>                        
                    </div>
                </form>
                <div class="row mt-5 justify-content-center">
                    <div class="col col-auto">
                        <a href="/MonCompte" class="font-alfa black hover-coral" id="link">Annuler</a>
                    </div>
                </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
</article>
@include('Flooflix.layouts.footer')
@include('Flooflix.layouts.varJS')
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/editUserScript.js"></script>
@endsection