@extends('Flooflix.layouts.base')
@section('content')
@include('Flooflix.layouts.header')
@php
    $user = auth()->user('id');
@endphp 
<!-- Main -->
<article class="min-88 pt-5">
    <div class="container">
        <div class="row pt-5">
            <div class="col-lg-4"></div>
            <div class="col-lg-4" id="bg">
                <header class="mt-4 text-center">
                    <h1 id="title">{{ __('Ajouter des crédits') }}</h1>
                </header>
                <form action="{{ action('UserController@storeCredits', $user) }}" class="mt-5 mx-5" method="POST">
                    @csrf
                    <div class="form-group">
                        <p>{{ __('Nombre de crédits à ajouter:') }}</p>
                        <select name="credits" id="credits" class="form-control{{ $errors->has('credits') ? ' is-invalid' : '' }}" value="{{ old('credits') }}" required>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        @if ($errors->has('credits'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('credits')) }}</p>
                        @endif
                    </div>
                    <div class="mt-5">
                        <p>{{ __('Carte à débiter :') }}</label>
                        <p>N°{{ substr(decrypt($bankCard->number),0,4) }}-{{ substr(decrypt($bankCard->number),4,4) }}-XXXX-XXXX</p>
                    </div>
                    <div class="row mt-5 justify-content-center">    
                        <div class="col col-auto">
                            <button type="submit" class="btn btn-color btn-md">Valider</button>
                        </div>                       
                    </div>
                </form>
                <div class="row mt-5 justify-content-center">                        
                    <div class="col col-auto">
                        <a href="{{ route('user.account',$user) }}" id="link">Annuler</a>
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
<script src="http://127.0.0.1:8000/js/flooflix/addCreditsScript.js"></script>
@endsection