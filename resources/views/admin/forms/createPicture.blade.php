@extends('admin.layouts.base')
@section('content')
<article class="container-fluid bg-black" role="main">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="container bg-white border mt-5 font-alfa black">
                <div class="row"> 
                    <div class="col">
                        <header class="text-center mt-4 mx-5">
                            <h1>{{__('Ajouter une image')}}</h1>
                        </header>
                        @include('admin.partials.message')      
                        <form action="/picture" role="form" class="mt-5 mx-5" method="POST" enctype="multipart/form-data">
                            @csrf
                            @include('admin.partials.form-group', [
                            'title' => __('Nom'),
                            'type' => 'text',
                            'name' => 'name',
                            'value' => old('name')
                            ])
                            @include('admin.partials.form-file')
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
        <a href="/picture" class="azure" id="hover-red">{{ __("Retour à la liste") }}</a> 
    </div>
</article>  
@endsection