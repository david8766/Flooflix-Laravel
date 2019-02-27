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
                            <form action="/text" role="form" class="mt-5 mx-5" method="POST">
                            @csrf
                            @include('admin.partials.form-group-select', [
                                'title' => __('Sélectionnez une page:'),
                                'name' => 'pages',
                                'empty' => __('Veuillez enregister une page au préalable'),
                                ])
                            @include('admin.partials.form-group', [
                                'title' => __('Titre de référence'),
                                'type' => 'text',
                                'name' => 'title',
                                'value' => old('title')
                                ])
                            @include('admin.partials.form-group-area',['text' => old('text')])
                            @component('admin.components.button')
                                @lang('Enregistrer')
                            @endcomponent
                        </form>
                    </div>    
                </div>
            </div>
        </div>  
    </div>
    <div class="row mt-4 justify-content-center">
        <a href="/text" class="azure" id="hover-red">{{ __("Retour à la liste") }}</a> 
    </div>
</article>   
@endsection