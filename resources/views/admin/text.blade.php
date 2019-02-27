@extends('admin.layouts.base')
@section('content')
<!-- Main -->
    <article role="main" class="container azure font-alfa">
        <header>
            <h1 class="mt-5 separator">{{ __("Informations ce texte") }}</h1>
        <h2 class="mt-5">{{ 'Titre de référence : " '. $text['title'] . ' "'}}</h2>
        </header>
        <p class="mt-5">{{ 'Son contenu: '. $text['text'] }}</p>
        <hr class="bg-white">
        <div class="row">
            <a href="{{ route('text.index') }}" class="azure" id="hover-red">{{ __("Retour la liste des textes") }}</a> 
        </div>
        @if (isset($page))
            <div class="row">
                <a href="{{ action('TextController@showTextsForPage', $page ) }}" class="azure" id="hover-red">{{ __("Retour à la liste des textes pour cette page") }}</a> 
            </div>
        @endif
        <hr class="bg-white">
        <div class="row">
            <a href="/admin/home" class="azure" id="hover-red">{{ __("Retour à l'accueil") }}</a> 
        </div>
    </article>  
@endsection