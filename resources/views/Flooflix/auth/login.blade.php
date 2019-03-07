@extends('Flooflix.layouts.base')
@section('content')
@include('Flooflix.layouts.header')
<!-- Main -->
<article>
    <div class="container min-100">
        <div class="row pt-5">
            <div class="col-lg-4"></div>
            <div class="col-lg-4" id="bg">
                <header class="text-center mt-5">
                    <h1 class="global">{{ __('Identifiez-vous') }}</h1>
                    <p class="mt-2 global">{{ __('Pas encore de compte?') }}</p>
                    <a href="{{ route('user.register') }}" class="links">{{ __('Inscrivez-vous') }}</a>
                </header>
                <form action="/login" role="form" class="mt-5 mx-5" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="login" class="global">{{ __('Login') }}</label>
                        <input type="text" name="login" class="form-control form-control-md {{ $errors->has('login') ? ' is-invalid' : '' }}" value="{{ old('login') }}">
                        @if ($errors->has('login'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('login')) }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="pwd" class="global">{{ __('Mot de passe') }}</label>
                        <input type="password" name="password" class="form-control form-control-md {{ $errors->has('pwd') ? ' is-invalid' : '' }}" id="pwd">
                        @if ($errors->has('pwd'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('pwd')) }}</p>
                        @endif
                        <small><a href="{{ route('password.request') }}" class="links">{{ __('Mot de passe oublié?') }} </a></small>     
                    </div>
                    <div class="row mt-5 justify-content-center">
                        <div class="col col-auto">
                            <button type="submit" class="btn btn-warning btn-md links">{{ __('Valider') }}</button>
                        </div>
                    </div>
                </form>
                <div class="row mt-5 justify-content-center">
                    <div class="col col-auto">
                        <a href="/" class="links">{{ __('Annuler') }}</a>
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
<script src="js/flooflix/login.js"></script>

@endsection