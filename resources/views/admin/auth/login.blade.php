@extends('admin.layouts.base')

@section('content')
<article class="container-fluid bg-black" role="main">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="container bg-white border mt-5 font-alfa black">
                <div class="row"> 
                    <div class="col">
                        @if (\Session::has('message'))
                            <div class="alert alert-success">
                                <p class="p-0 m-0">{{ __(\Session::get('message')) }}</p>
                            </div>
                        @endif
                        @if (\Session::has('error'))
                            <div class="alert alert-danger">
                                <p class="p-0 m-0">{{ __(\Session::get('error')) }}</p>
                            </div>
                        @endif
                        <header class="text-center mt-4 mx-5">
                            <h1 class="relief">FLOOFLIX-dev</h1>
                        </header>
                        <form action="admin" role="form" class="mt-5 mx-5" method="POST">
                            @csrf
                            @include('admin.partials.form-group', [
                            'title' => __('Login'),
                            'type' => 'text',
                            'name' => 'login',
                            'value' => old('login')
                            ])
                            @include('admin.partials.form-group', [
                            'title' => __('Mot de passe'),
                            'type' => 'password',
                            'name' => 'password',
                            'value' => ''
                            ])
                            @component('admin.components.button')
                                @lang('Se connecter')
                            @endcomponent
                        </form>
                    </div>    
                </div>
            </div>
        </div>  
    </div>
</article>   
@endsection