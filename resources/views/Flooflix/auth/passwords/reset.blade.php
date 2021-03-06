@extends('Flooflix.layouts.base')
@section('content')
@include('Flooflix.layouts.header')
<!-- Main -->
<article>
@include('Flooflix.partials.message')
    <div class="container-fluid min-100 bg-black">
        @include('Flooflix.partials.message')
        <div class="row pt-5">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 bg-white">
                <header class="text-center mt-5">
                    <h1 class="global font-alfa">{{ __('Réinitialisation de votre mot de passe') }}</h1>
                </header>  
            <form action="{{ action('UserController@updatePassword',$token)}}" role="form" class="mt-5 mx-5" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email" class="font-alfa">Email</label>
                        <input type="email" name="email" class="form-control font-alfa {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Tapez Votre email">
                        @if ($errors->has('email'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('email')) }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password" class="font-alfa">Mot de passe</label>
                        <input type="password" name="password" class="form-control font-alfa {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Tapez votre nouveau mot de passe">
                        @if ($errors->has('password'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('password')) }}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-warning mb-2 font-alfa">Valider</button>
                </div>
                </form>
                <div class="row mt-5 justify-content-center">
                    <div class="col col-auto">
                        <a href="/" class="links font-alfa black hover-coral">{{ __('Annuler') }}</a>
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