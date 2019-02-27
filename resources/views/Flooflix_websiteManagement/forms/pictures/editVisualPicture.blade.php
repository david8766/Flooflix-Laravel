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
                    <h1 class="font-alfa black">Modifier l'image</h1>
                    <p class="font-alfa mt-5">{{ $picture->name }}</p>
                </header>
                <form action="{{ action('PictureController@updateVisualOfPicture', $picture) }}" class="mt-5 mb-5 mx-5" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="picture" class="custom-file-input {{ $errors->has('picture') ? ' is-invalid' : '' }}">
                                <label class="custom-file-label" for="picture">{{ __('Choisir un fichier') }}</label>
                                @if ($errors->has('picture'))
                                    <p class="invalid-feedback" role="alert">{{ __($errors->first('picture')) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>  
                    <div class="row mt-5 justify-content-center">
                        <div class="col col-auto">
                            <button type="submit" class="btn btn-danger btn-md font-alfa">Enregistrer</button>
                        </div>
                    </div>
                </form>
                <div class="row mt-5 justify-content-center">
                    <div class="col col-auto">
                    <a href="{{ route('pictures.list') }}" class="font-alfa black hover-coral">Annuler</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</article>
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/combobox.js"></script>
@endsection