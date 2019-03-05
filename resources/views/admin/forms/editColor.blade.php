@extends('admin.layouts.base')

@section('content')
<article class="container-fluid bg-black" role="main">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container bg-white border mt-5 font-alfa black">
                <div class="row"> 
                    <div class="col">
                        <header class="text-center mt-4 mx-5">
                            <h1>{{ __('Modifier la couleur ' . $color->name) }}</h1>
                        </header>                        
                        <form action="{{ action('ColorController@update', $color) }}" role="form" class="mt-5 mx-5" method="POST">
                            @method('PATCH')
                            @csrf
                            @include('admin.partials.form-group', [
                            'title' => __('Nom'),
                            'type' => 'text',
                            'name' => 'name',
                            'value' => $color->name
                            ])
                            @include('admin.partials.form-group', [
                            'title' => __('Rgb'),
                            'type' => 'text',
                            'name' => 'rgb',
                            'value' => $color->rgb
                            ])
                            @include('admin.partials.form-group', [
                            'title' => __('Style'),
                            'type' => 'text',
                            'name' => 'opacity',
                            'value' => $color->opacity
                            ])
                            @component('admin.components.button')
                                @lang('Modifier')
                            @endcomponent
                        </form>
                    </div>    
                </div>
            </div>
            <div class="row mt-4 justify-content-center">
                <a href="/color" class="azure hover-red">{{ __("Retour à la liste") }}</a> 
            </div>
            <div class="row mt-4 justify-content-center">
                <a href="https://www.css3maker.com/css-3-rgba.html" target="_blank" class="azure hover-red">{{ "CSS3 Maker" }}</a> 
            </div>
        </div>
    </div>
</article>   
@endsection