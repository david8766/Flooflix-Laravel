@extends('admin.layouts.base')
@section('content')
<!-- Main -->
    <article role="main" class="container azure font-alfa">
        <header>
            <h1 class="mt-5 separator">Liste des images</h1>
        </header>
        @include('admin.partials.message')
        <div class="row mt-5">
            <div class="col-12 table-responsive p-0">
                <table class="table table-light table-bordered black">
                    <thead>
                        <tr>
                            <th>NOM</th>
                            <th>DOSSIER DE STOCKAGE</th>
                            <th>STYLE</th>
                            <th>IMAGE</th>
                            <th colspan="3">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @forelse($pictures as $picture)                            
                        <tr>
                            <td>{{ __($picture['name']) }}</td>
                            <td>{{ __($picture['link']) }}</td>
                            <td>{{ __($picture['style']) }}</td>
                            <td><div style="height: 6rem; width: 10rem; background-image: url('{{asset($picture['style'])}}');background-repeat: no-repeat;background-size: cover;"></div></td>
                            <td>
                                <a href="{{ action('PictureController@show', $picture) }}" class="btn btn-success btn-sm">{{ __('Voir') }}</a>
                            </td>
                            <td>
                                <a href="{{ action('PictureController@edit', $picture) }}" class="btn btn-warning btn-sm">{{ __('Modifier') }}</a>
                            </td>
                            <td>
                                <form action="{{ action('PictureController@destroy', $picture)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit">{{ __('Supprimer') }}</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                            <td colspan="4">{{ __("pas d'image enregistrée") }}</td>
                            </tr>
                        @endforelse
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <a href="/admin/home" class="azure hover-red">{{ __("Retour à l'accueil") }}</a> 
        </div>
        <div class="row"></div>
            <a href="/picture/create" class="azure hover-red">{{ __('Ajouter une image') }}</a>
        </div>
    </article> 
@endsection