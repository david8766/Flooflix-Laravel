@extends('admin.layouts.base')
@section('content')
<!-- Main -->
    <article role="main" class="container azure font-alfa">
        <header>
            <h1 class="mt-5 separator">{{ __('Liste des pages du site '. $website['name'] ) }}</h1>
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
                            <th>{{ __('Nom') }}</th>
                            <th>{{ __('URL') }}</th>
                            <th colspan="3">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pages as $page)         
                        <tr>
                            <td>{{ __($page['name']) }}</td>
                            <td>{{ __($page['url']) }}</td>
                            <td>
                                <a href="{{ action('PageController@show', $page) }}" class="btn btn-success">{{ __('Voir') }}</a>
                            </td>
                            <td>
                                <a href="{{ action('PageController@edit', $page) }}" class="btn btn-warning">{{ __('Modifier') }}</a>
                            </td>
                            <td>
                                <form action="{{action('PageController@destroy', $page)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit">{{ __('Supprimer') }}</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td>{{ __('Ce site ne contient pas de pages') }}</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <a href="{{ route('website.show', $website) }}" class="azure" id="hover-red">{{ __("Voir sur les informations du site") }}</a> 
        </div>
        <div class="row">
            <a href="{{ route('page.index') }}" class="azure" id="hover-red">{{ __("Voir toutes les pages") }}</a> 
        </div>
        <div class="row"></div>
            <a href="{{ route('page.create') }}" class="azure" id="hover-red">{{ __('Ajouter une page') }}</a>
        </div>
        <hr class="bg-white">
        <div class="row">
            <a href="/admin/home" class="azure" id="hover-red">{{ __("Retour à l'accueil") }}</a> 
        </div>
    </article>  
@endsection