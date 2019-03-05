@extends('admin.layouts.base')
@section('content')
<!-- Main -->
    <article role="main" class="container azure font-alfa">
        <header>
            <h1 class="mt-5 separator">{{ __("Informations sur l'image  ". $picture['name']) }}</h1>
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
                            <th>{{ __('Dossier de stockage') }}</th>
                            <th>{{ __('Style') }}</th>
                        </tr>
                    </thead>
                    <tbody>                                                  
                        <tr>
                            <td>{{ __($picture['name']) }}</td>
                            <td>{{ __($picture['link']) }}</td>
                            <td>{{ __($picture['style']) }}</td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div style="height: 30rem; width: 50rem; border:2px solid white; background-image: url('{{asset($picture['style'])}}');background-repeat: no-repeat;background-size: cover;"></div>
        </div>
        <div class="row">
            <a href="{{ route('picture.index') }}" class="azure hover-red">{{ __("Retour la liste des images") }}</a> 
        </div>
    </article>  
@endsection