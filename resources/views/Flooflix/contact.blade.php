@extends('Flooflix.layouts.base')
@section('content')
@include('Flooflix.layouts.header')

<!-- Main -->
<article role="main" class="min-100 bg-black">
    @include('Flooflix.partials.message')
    <div class="container pb-5 pt-5">
        <div class="row pt-5">
            <div class="col-2"></div>
            <div class="col-8 pb-4">
                <header>
                    <h1 class="font-alfa azure"><i class="fas fa-envelope pr-4"></i>Contactez-nous</h1>
                </header>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form action="" role="form" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Sujet</span>
                        </div>
                        <input type="text" name="subject" class="form-control {{ $errors->has('subject') ? ' is-invalid' : '' }}" aria-label="subject" aria-describedby="subject" value="{{ old('subject') }}">
                        @if ($errors->has('subject'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('subject')) }}</p>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text ">Message</span>
                        </div>
                        <textarea class="form-control {{ $errors->has('message') ? ' is-invalid' : '' }}" id="message" name="message" rows="10" cols="40" aria-label="message">{{ old('message') }}</textarea>
                        @if ($errors->has('message'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('message')) }}</p>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="nom">Nom</span>
                        </div>
                        <input type="text" name="last_name" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="Votre nom" aria-label="nom" aria-describedby="nom" value="{{ old('last_name') }}">
                        @if ($errors->has('last_name'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('last_name')) }}</p>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="prenom">Prénom</span>
                        </div>
                        <input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="Votre prénom" aria-label="prenom" aria-describedby="prenom" value="{{ old('first_name') }}">
                        @if ($errors->has('first_name'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('first_name')) }}</p>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Votre adresse mail" aria-label="Adresse mail" aria-describedby="adresse-mail" value="{{ old('email') }}">
                        <div class="input-group-append">
                            <span class="input-group-text" id="adresse-mail">prenom.nom@exemple.fr</span>
                        </div>
                        @if ($errors->has('email'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('email')) }}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-warning btn-md">Envoyer</button>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</article>
@include('Flooflix.layouts.footer')
@include('Flooflix.layouts.varJS')
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/home.js"></script>
@endsection