@extends('admin.layouts.base')
@section('content')
<article class="container-fluid bg-black" role="main">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container bg-white border mt-5 font-alfa black">
                <div class="row"> 
                    <div class="col">
                        <header class="text-center mt-4 mx-5">
                            <h1>{{ __('Modifier la page ' . $page->name) }}</h1>
                        </header>                        
                        <form action="{{ action('PageController@update', $page) }}" role="form" class="mt-5 mx-5" method="POST">
                            @method('PATCH')
                            @csrf
                            @include('admin.partials.form-group', [
                            'title' => __('Nom de la page'),
                            'type' => 'text',
                            'name' => 'name',
                            'value' => $page->name
                            ])
                            @include('admin.partials.form-group', [
                            'title' => __('URL du site'),
                            'type' => 'text',
                            'name' => 'url',
                            'value' => $page->url
                            ])
                            @component('admin.components.button')
                                @lang('Modifier')
                            @endcomponent
                        </form>
                    </div>    
                </div>
            </div>
            <div class="row mt-4 justify-content-center">
                <a href="/website" class="azure hover-red">{{ __("Retour à la liste") }}</a> 
            </div>
        </div>
    </div>
</article>   
@endsection