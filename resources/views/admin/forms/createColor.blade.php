@extends('admin.layouts.base')
@section('content')
<article class="container-fluid bg-black" role="main">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="container bg-white border mt-5 font-alfa black">
                <div class="row"> 
                    <div class="col">
                        <header class="text-center mt-4 mx-5">
                            <h1>{{__('Ajouter une couleur')}}</h1>
                        </header>
                        @include('admin.partials.message')              
                        <form action="/color" role="form" class="mt-5 mx-5" method="POST">
                            @csrf
                            @include('admin.partials.form-group', [
                            'title' => __('Nom'),
                            'type' => 'text',
                            'name' => 'name',
                            'value' => old('name')
                            ])
                            @include('admin.partials.form-group', [
                            'title' => __('rgb'),
                            'type' => 'text',
                            'name' => 'rgb',
                            'value' => old('rgb')
                            ])
                            @include('admin.partials.form-group', [
                            'title' => __('Opacité'),
                            'type' => 'text',
                            'name' => 'opacity',
                            'value' => old('opacity')
                            ])
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
        <a href="/color" class="azure hover-red">{{ __("Retour à la liste") }}</a> 
    </div>
    <div class="row mt-4 justify-content-center">
        <a href="https://www.css3maker.com/css-3-rgba.html" target="_blank" class="azure hover-red">{{ "CSS3 Maker" }}</a> 
    </div>
    <div class="row mt-4 justify-content-center">
        <a href="https://fr.wikipedia.org/wiki/Couleur_du_Web" target="_blank" class="azure hover-red">{{ "Les couleurs du web" }}</a> 
    </div>
</article>   
@endsection