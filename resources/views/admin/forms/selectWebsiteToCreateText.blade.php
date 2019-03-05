@extends('admin.layouts.base')
@section('content')
<article class="container-fluid bg-black" role="main">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="container bg-white border mt-5 font-alfa black">
                <div class="row"> 
                    <div class="col">
                        <header class="text-center mt-4 mx-5">
                            <h1>{{__('Ajouter un texte')}}</h1>
                        </header>
                        @include('admin.partials.message')
                        <form action="/getPagesForAddText" role="form" class="mt-5 mx-5" method="POST">
                            @csrf
                            @include('admin.partials.form-group-select', [
                            'title' => __('Sélectionnez un site:'),
                            'name' => 'websites',
                            'empty' => __('Veuillez enregister un site au préalable'),
                            ])
                            @component('admin.components.button')
                                @lang('Valider')
                            @endcomponent
                        </form>   
                    </div>    
                </div>
            </div>
        </div>  
    </div>
    <div class="row mt-4 justify-content-center">
        <a href="/text" class="azure hover-red">{{ __("Retour à la liste") }}</a> 
    </div>
</article>   
@endsection