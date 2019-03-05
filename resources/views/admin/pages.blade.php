@extends('admin.layouts.base')
@section('content')
<!-- Main -->
    <article role="main" class="container azure font-alfa">
        <header>
            <h1 class="mt-5 separator">{{ __('Liste des pages') }}</h1>
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
                            <th>{{ __('Site') }}</th>
                            <th colspan="3">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pages as $page)                            
                        <tr>
                            <td>{{ __($page['name']) }}</td>
                            <td>{{ __($page['url']) }}</td>
                            <td>
                                @forelse ($websites as $website)
                                    @if ($page->website_id == $website->id)
                                        <a href="{{ route('website.pages', [$website]) }}" class="black" id="hover-red">{{ $website['name'] }}</a>
                                    @else
                                        {{ '' }}
                                    @endif 
                                @empty
                                    {{ __('pas de site enregistré')}}   
                                @endforelse
                            </td>
                            <td>
                                <a href="{{ action('PageController@show', $page) }}" class="btn btn-success">{{ __('Voir') }}</a>
                            </td>
                            <td>
                                <a href="{{ action('PageController@edit', $page) }}" class="btn btn-warning">{{ __('Modifier') }}</a>
                            </td>
                            <td>
                                <form action="{{ action('PageController@destroy', $page) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit">{{ __('Supprimer') }}</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>{{ __('Aucune page enregistrée') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row"></div>
        <a href="/page/create" class="azure hover-red">{{ __('Ajouter une page') }}</a>
        </div>
        <hr class="bg-white">
        <div class="row">
            <a href="/admin/home" class="azure hover-red">{{ __("Retour à l'accueil") }}</a> 
        </div>
    </article>  
@endsection