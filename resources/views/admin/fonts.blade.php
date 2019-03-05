@extends('admin.layouts.base')
@section('content')
<!-- Main -->
    <article role="main" class="container azure font-alfa">
        <header>
            <h1 class="mt-5 separator">{{ __('Liste des polices') }}</h1>
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
                            <th>{{ __('Lien') }}</th>
                            <th>{{ __('Style') }}</th>
                            <th colspan="2">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fonts as $font)                            
                        <tr>
                            <td style="{{ $font['style'] }}">{{ __($font['name']) }}</td>
                            <td style="{{ $font['style'] }}">{{ __($font['link']) }}</td>
                            <td style="{{ $font['style'] }}">{{ __($font['style']) }}</td>
                            <td>
                                <a href="{{ action('FontController@edit', $font) }}" class="btn btn-warning">{{ __('Modifier') }}</a>
                            </td>
                            <td>
                                <form action="{{action('FontController@destroy', $font)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit">{{ __('Supprimer') }}</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>{{ __('pas de polices enregistrées') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row"></div>
        <a href="/font/create" class="azure hover-red">{{ __('Ajouter une police') }}</a>
        </div>
        <hr class="bg-white">
        <div class="row">
            <a href="/admin/home" class="azure hover-red">{{ __("Retour à l'accueil") }}</a> 
        </div>
    </article>  
@endsection