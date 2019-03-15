@extends('Flooflix.layouts.base')
@section('content')
@include('Flooflix.layouts.header')
<!-- Main -->
<article class="min-100">
    @include('Flooflix.partials.message')
    <div class="container">
        <div class="row pt-5 pb-5">
            <div class="col-lg-4"></div>
            <div class="col-lg-4" id="bg">
                @include('Flooflix.partials.message')
                <header class="text-center mt-5">
                    <h1 class="global">{{ __('Inscrivez-vous')}}</h1>
                    <p class="global">{{ __('Vous avez déjà un compte?')}}</p>
                    <a href="Connection" class="links">{{ __('Identifiez-vous')}}</a>
                </header>
                <form action="/register" class="mt-2 mx-5" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="last_name" class="global">{{ __('Nom')}}</label>
                        <input type="text" name="last_name" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" value="{{ old('last_name') }}" id="last_name">
                        @if ($errors->has('last_name'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('last_name')) }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="first_name" class="global">{{ __('Prénom')}}</label>
                        <input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" value="{{ old('first_name') }}" id="first_name">
                        @if ($errors->has('first_name'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('first_name')) }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email" class="global">{{ __('Email')}}</label>
                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" id="email">
                        @if ($errors->has('email'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('email')) }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="login" class="global">{{ __('Login')}}</label>
                        <input type="text" name="login" class="form-control {{ $errors->has('login') ? ' is-invalid' : '' }}" value="{{ old('login') }}" id="login">
                        @if ($errors->has('login'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('login')) }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password" class="global">{{ __('Mot de passe')}}</label>
                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" id="password">
                        @if ($errors->has('password'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('password')) }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="birth_date" class="global">{{ __('Date de naissance')}}</label>
                        <input type="date" name="birth_date" class="form-control {{ $errors->has('birth_date') ? ' is-invalid' : '' }}" value="{{ old('birth_date') }}" id="birth_date">
                        @if ($errors->has('birth_date'))
                            <p class="invalid-feedback" role="alert">{{ __('Le champ date de naissance est obligatoire.') }}</p>
                        @endif
                    </div>
                    <div class="row mt-5 justify-content-center">    
                        <div class="col col-auto">
                            <button type="submit" class="btn btn-warning btn-md links">{{ __('Créer votre compte') }}</button>
                        </div>    
                    </div>
                </form>
                <div class="row mt-5 justify-content-center">
                    <div class="col col-auto">
                        <a href="/" class="links">{{ __('Annuler')}}</a>
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
<script src="http://127.0.0.1:8000/js/flooflix/register.js"></script>
@endsection