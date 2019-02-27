@extends('admin.layouts.base')
@section('content')
<!-- Main -->
    <article role="main" class="container azure font-alfa">
        <header>
            <h1 class="mt-5 separator">{{ __('Liste des textes pour la page '. $page['name'] ) }}</h1>
        </header>
        @if (\Session::has('message'))
            <div class="alert alert-success">
                <p class="p-0 m-0">{{ __(\Session::get('message')) }}</p>
            </div><br />
        @endif
        <div class="row mt-5">
            <div class="col table-responsive">
                <table class="table table-light table-bordered black">
                    <thead>
                        <tr>
                            <th>{{ __('Titre de référence') }}</th>
                            <th colspan="3">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($texts as $text)         
                        <tr>
                            <td>{{ __($text['title']) }}</td>
                            <td>
                                <a href="{{ action('TextController@show', $text) }}" class="btn btn-success">{{ __('Voir') }}</a>
                            </td>
                            <td>
                                <a href="{{ action('TextController@edit', $text) }}" class="btn btn-warning">{{ __('Modifier') }}</a>
                            </td>
                            <td>
                                <form action="{{action('TextController@destroy', $text)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit">{{ __('Supprimer') }}</button>
                                </form>
                            </td>
                        </tr>         
                        @empty
                            <td colspan="2">{{ __('Pas de textes enregistrés pour cette page') }}</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <a href="{{ action('PageController@show', $page) }}" class="azure" id="hover-coral">{{ __("Retour aux informations de cette page") }}</a> 
        </div>
        <hr class="bg-white">
        <div class="row">
            <a href="/admin/home" class="azure" id="hover-coral">{{ __("Retour à l'accueil") }}</a> 
        </div>
    </article>  
@endsection