@extends('admin.layouts.base')
@section('content')
<!-- Main -->
    <article role="main" class="container azure font-alfa">
        <header>
            <h1 class="mt-5 separator">{{ __('Informations sur le site  '. $website['name']) }}</h1>
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
                        </tr>
                    </thead>
                    <tbody>                                                  
                        <tr>
                            <td>{{ __($website['name']) }}</td>
                            <td>{{ __($website['url']) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <a href="{{ route('website.index') }}" class="azure" id="hover-red">{{ __("Retour la liste des sites") }}</a> 
        </div>
        <div class="row"></div>
            <a href="{{ route('website.pages', [$website]) }}" class="azure" id="hover-red">{{ __('Voir la liste des pages') }}</a>
        </div>
        <div class="row"></div>
        <a href="/page/create" class="azure" id="hover-red">{{ __('Ajouter une page') }}</a>
        </div>
        <hr class="bg-white">
        <div class="row">
            <a href="/admin/home" class="azure" id="hover-red">{{ __("Retour à l'accueil") }}</a> 
        </div>
    </article>  
@endsection