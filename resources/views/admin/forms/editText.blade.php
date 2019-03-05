@extends('admin.layouts.base')
@section('content')
<article class="container-fluid bg-black" role="main">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container bg-white border mt-5 font-alfa black">
                <div class="row"> 
                    <div class="col">
                        <header class="text-center mt-4 mx-5">
                            <h1>{{ __('Modifier le texte ' . $text->name) }}</h1>
                        </header>                        
                        <form action="{{ action('TextController@update', $text) }}" role="form" class="mt-5 mx-5" method="POST">
                            @method('PATCH')
                            @csrf
                            @include('admin.partials.form-group', [
                            'title' => __('Titre de référence'),
                            'type' => 'text',
                            'name' => 'title',
                            'value' => $text->title
                            ])
                            @include('admin.partials.form-group-area',['text' => $text->text])
                            @component('admin.components.button')
                                @lang('Modifier')
                            @endcomponent
                        </form>
                    </div>    
                </div>
            </div>
            <div class="row mt-4 justify-content-center">
                <a href="/text" class="azure hover-red">{{ __("Retour à la liste") }}</a> 
            </div>
        </div>
    </div>
</article>   
@endsection