@extends('admin.layouts.base')

@section('content')
<article class="container-fluid bg-black" role="main">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="container bg-white border mt-5 font-alfa black">
                <div class="row"> 
                    <div class="col">
                        <header class="text-center mt-4 mx-5">
                            <h1>{{__('Ajouter un site')}}</h1>
                        </header>
                        @include('admin.partials.message')
                        <form action="/website" role="form" class="mt-5 mx-5" method="POST">
                            @csrf
                            @include('admin.partials.form-group', [
                            'title' => __('Nom du site'),
                            'type' => 'text',
                            'name' => 'name',
                            'value' => old('name')
                            ])
                            @include('admin.partials.form-group', [
                            'title' => __('URL du site'),
                            'type' => 'text',
                            'name' => 'url',
                            'value' => old('url')
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
        <a href="/website" class="azure" id="hover-red">{{ __("Retour à la liste") }}</a> 
    </div>
</article>   
@endsection