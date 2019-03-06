@extends('Flooflix.layouts.base')
@section('content')
@include('Flooflix.layouts.header')

<!-- Main -->
<article role="main" class="min-100 bg-black">
    <div class="container pb-5 pt-5">
        <div class="row pt-5">
            <div class="col-2"></div>
            <div class="col-8 pb-4">
                <header>
                    <h1 class="font-alfa azure"><i class="fas fa-envelope pr-4"></i>Contactez-nous</h1>
                </header>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form role="form">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Sujet</span>
                        </div>
                        <input type="text" class="form-control" placeholder="" aria-label="sujet" aria-describedby="sujet">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text ">Message</span>
                        </div>
                        <textarea class="form-control" id="message" name="message" rows="10" cols="40" aria-label="message"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text " id="prenom">Prénom</span>
                        </div>
                        <input type="text" class="form-control " placeholder="Votre prénom" aria-label="prenom" aria-describedby="prenom">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text " id="nom">Nom</span>
                        </div>
                        <input type="text" class="form-control " placeholder="Votre nom" aria-label="nom" aria-describedby="nom">
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control " placeholder="Votre adresse mail" aria-label="Adresse mail" aria-describedby="adresse-mail">
                        <div class="input-group-append">
                            <span class="input-group-text" id="adresse-mail">prenom.nom@exemple.fr</span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning btn-md">Envoyer</button>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</article>

@include('Flooflix.layouts.footer')
@include('Flooflix.layouts.varJS')
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/home.js"></script>
@endsection