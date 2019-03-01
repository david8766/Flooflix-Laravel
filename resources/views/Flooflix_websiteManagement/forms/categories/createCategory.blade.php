@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article>
    <div class="container">
        @include('Flooflix.partials.message')
        <div class="row pt-5">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 bg-white">
                <header class="text-center mt-4">
                    <h1 class="font-alfa black">Ajouter une catégorie</h1>
                </header>
                <form action="{{ action('CategoryController@store') }}" class="mt-5 mx-5" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-5">
                        <label for="genre" class="font-alfa black">Genre</label>
                        <input type="text" class="form-control {{ $errors->has('genre') ? ' is-invalid' : '' }}" name="genre" value="{{ old('genre') }}">
                        @if ($errors->has('genre'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('genre')) }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="form-group displayComboBox" id="comboBox">
                            <label for="picture1" class="font-alfa black">{{ __("Rechercher une image dans la liste")}}</label>
                            <input type="text" name="picture1" class="form-control displayEditField {{ $errors->has('picture1') ? ' is-invalid' : '' }}" id="comboBoxEditField1">
                            <select disabled="disabled" name="picture1" class="form-control hideComboBoxList" id="comboBoxList1">
                                @dump($pictures)
                                @foreach ($pictures as $picture)
                                <option value="{{ $picture->id }}">{{ $picture->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('picture1'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('picture1')) }}</p>
                            @endif
                        </div>
                        <p class="font-alfa black mt-5">Ou ajouter une nouvelle image</p>
                        <div class="form-group">
                            <label for="name" class="font-alfa black">Titre de l'image</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <p class="invalid-feedback" role="alert">{{ __($errors->first('name')) }}</p>
                        @endif
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="picture2" class="custom-file-input {{ $errors->has('picture2') ? ' is-invalid' : '' }}">
                                <label class="custom-file-label" for="picture2">{{ __('Choisir un fichier') }}</label>
                                @if ($errors->has('picture2'))
                                    <p class="invalid-feedback" role="alert">{{ __($errors->first('picture2')) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5 justify-content-center">
                        <div class="col col-auto">
                            <button type="submit" class="btn btn-warning btn-md font-alfa">Enregistrer</button>
                        </div>
                    </div>
                </form>
                <div class="row mt-5 justify-content-center">
                    <div class="col col-auto">
                    <a href="{{ route('movies.management')}}" class="font-alfa black hover-coral">Annuler</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</article>
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/combobox.js"></script>
<script>
    $('document').ready(function() {
        document.body.style.backgroundColor = 'black';
    })
</script>