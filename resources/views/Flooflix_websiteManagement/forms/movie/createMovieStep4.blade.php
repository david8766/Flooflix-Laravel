@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article role="main">
    <div class="container-fluid">
        <div class="row pt-5 pb-5">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 bg-white">
                @include('Flooflix.partials.message')
                <header class="text-center mt-4">
                    <h1 class="font-alfa black">Ajouter un image - Etape 4</h1>
                    <span class="red">* L'image doit avoir environ une hauteur de 500px et une largeur de 400px</span>
                    <p><a href="https://www.iloveimg.com/fr/redimensionner-image" target="_blank" class="black" id="hover-red"><i class="fas fa-arrow-circle-right"></i> Redimenssionner une image</a></p>
                </header>
                <form action="{{ action('MovieController@storeStep4', $movie) }}" class="mt-5 mb-5 mx-5" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="form-group displayComboBox" id="comboBox">
                            <label for="picture1" class="font-alfa black">{{ __("Rechercher une image dans la liste")}}</label>
                            <input type="text" name="picture1" class="form-control displayEditField" id="comboBoxEditField1">
                            <select disabled="disabled" name="picture1" class="form-control hideComboBoxList" id="comboBoxList1">
                                @foreach ($pictures as $id => $picture)
                                <option value="{{ $id }}">{{ $picture }}</option>
                                @endforeach
                            </select>
                        </div>
                        <p class="font-alfa black mt-5">Ou ajouter une nouvelle image</p>
                        <div class="form-group">
                            <label for="name" class="font-alfa black">Titre de l'image</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="picture2" class="custom-file-input">
                                <label class="custom-file-label" for="picture2">{{ __('Choisir un fichier') }}</label>
                            </div>
                        </div>
                    </div>  
                    <div class="row mt-5 justify-content-center">
                        <div class="col col-auto">
                            <button type="submit" class="btn btn-warning btn-md font-alfa">Enregistrer et passer à l'étape suivante</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</article>
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/combobox.js"></script>
@endsection