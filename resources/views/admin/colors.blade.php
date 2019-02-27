@extends('admin.layouts.base')
@section('content')
<!-- Main -->
    <article role="main" class="container azure font-alfa">
        <header>
            <h1 class="mt-5 separator">{{ __('Liste des couleurs') }}</h1>
        </header>
        @include('admin.partials.message')
        <div class="row mt-5">
            <div class="col table-responsive">
                <table class="table table-light table-bordered black">
                    <thead>
                        <tr>
                            <th>{{ __('Nom') }}</th>
                            <th>{{ __('Rgb') }}</th>
                            <th>{{ __('Opacité') }}</th>
                            <th>{{ __('Aperçu') }}</th>
                            <th colspan="2">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($colors as $color)                            
                        <tr>
                            <td>{{ __($color['name']) }}</td>
                            <td>{{ __($color['rgb']) }}</td>
                            <td>{{ __($color['opacity']) }}</td>
                        <td><div style="height: 3rem; width: 5rem; background-color: {{ $color['rgb'] }}; opacity: {{ $color['opacity'] }}"></div></td>
                            <td>
                                <a href="{{ action('ColorController@edit', $color) }}" class="btn btn-warning">{{ __('Modifier') }}</a>
                            </td>
                            <td>
                                <form action="{{ action('ColorController@destroy', $color) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit">{{ __('Supprimer') }}</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">{{ __('pas de couleurs enregistrées') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row"></div>
            <a href="/color/create" class="azure" id="hover-red">{{ __('Ajouter une couleur') }}</a>
        </div>
        <hr class="bg-white">
        <div class="row">
            <a href="/admin/home" class="azure" id="hover-red">{{ __("Retour à l'accueil") }}</a> 
        </div>
    </article>  
@endsection