@extends('admin.layouts.base')
@section('content')
<!-- Main -->
    <article role="main" class="container azure font-alfa">
        <header>
            <h1 class="mt-5 separator">{{ __('Liste des sites') }}</h1>
        </header>
        @include('admin.partials.message')
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
                        @forelse($websites as $website)                            
                        <tr>
                            <td>{{ __($website['name']) }}</td>
                            <td>{{ __($website['url']) }}</td>
                            <td>
                                <a href="{{ action('WebsiteController@show', $website) }}" class="btn btn-success">{{ __('Voir') }}</a>
                            </td>
                            <td>
                                <a href="{{ action('WebsiteController@edit', $website) }}" class="btn btn-warning">{{ __('Modifier') }}</a>
                            </td>
                            <td>
                                <form action="{{action('WebsiteController@destroy', $website)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit">{{ __('Supprimer') }}</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                            <td>{{ __('pas de site enregistrée') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row"></div>
            <a href="/website/create" class="azure hover-red">{{ __('Ajouter un site') }}</a>
        </div>
        <hr class="bg-white">
        <div class="row">
            <a href="{{ route('admin.home') }}" class="azure hover-red">{{ __("Retour à l'accueil") }}</a> 
        </div>
    </article>  
@endsection