@extends('Flooflix.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')

<!-- Main -->
<section role="main" class="container-fluid font-alfa azure">
    <header class="row mt-5 mx-5 separator">
        <div class="col">
            <h1><u>Choisir l'élément à modifier dans la page d'accueil :</u></h1>
            <ul class="mt-3">
                <li><a href="{{ route('home') }}" class="azure" id="hover-red">Voir la page d'accueil du site</a></li>
                <li><a href="{{ route('preview.homePage') }}" target="_blank" class="azure" id="hover-red">Voir l'aperçu</a></li>
            </ul>
        </div>
    </header>
    <!-- First Article - Jumbotron -->
    <article class="mx-5 separator pb-5">
        <header class="row mt-4">
            <h2><u>Sur la première bande :</u></h2>
        </header>
        <div class="row mt-3">
            <div class="col-md-3">
                <h4>Modifier l'arrière-plan :</h4>
                <form role="form" class="mt-3">
                    @include('Flooflix_websiteManagement.partials.form-group-background',[
                        'name_color' => 'backgroundColor_home_jumbotron',
                        'name_picture' => 'backgroundImage_home_jumbotron',
                        ])
                    <button type="button" id="background-jumbotron-submit" class="btn btn-success btn-sm" onclick="writeInLocalStorageBackgroundJumbotron();" hidden>Valider</button>
                    <button type="button" id="background-jumbotron-remove" class="btn btn-danger btn-sm" onclick="retrunSelectOptionForBackgroundJumbotron();" hidden>Annuler</button>
                    <button type="button" id="background-jumbotron-delete" class="btn btn-danger btn-sm" onclick="deleteOptionSelectedForBackgroundJumbotron();" hidden>Supprimer l'enregistrement</button>
                </form>
            </div>
            <div class="col-md-3">
                <h4>Modifier le titre :</h4>
                <form role="form" id="prout">
                    @include('Flooflix_websiteManagement.partials.form-group-text',[
                        'name' => 'text_home_title',
                        ])
                    <button type="button" id="text-home-title-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalTextTitle();"  hidden>Valider</button>
                    <button type="button" id="text-home-title-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForTextTitle();" hidden>Supprimer l'enregistrement</button>
                </form>
                <form role="form">
                    @include('Flooflix_websiteManagement.partials.form-group-font',[
                        'name' => 'font_home_title',
                        ])
                    <button type="button" id="font-home-title-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalStorageFontHomeTitle();" hidden>Valider</button>
                    <button type="button" id="font-home-title-remove" class="btn btn-danger btn-sm mb-3" onclick="retrunSelectOptionForFontHomeTitle();" hidden>Annuler</button>
                    <button type="button" id="font-home-title-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForFontHomeTitle();" hidden>Supprimer l'enregistrement</button>
                </form>
                <form>
                    @include('Flooflix_websiteManagement.partials.form-group-color',[
                        'name' => 'color_home_title',
                    ])
                    <button type="button" id="color-home-title-submit" class="btn btn-success btn-sm" onclick="writeInLocalStorageColorHomeTitle();" hidden>Valider</button>
                    <button type="button" id="color-home-title-remove" class="btn btn-danger btn-sm" onclick="retrunSelectOptionForColorHomeTitle();" hidden>Annuler</button>
                    <button type="button" id="color-home-title-delete" class="btn btn-danger btn-sm" onclick="deleteOptionSelectedForColorHomeTitle();" hidden>Supprimer l'enregistrement</button>
                </form>
            </div>
            <div class="col-md-3">
                <h4>Modifier la phrase d'accroche :</h4>
                <form role="form">
                    @include('Flooflix_websiteManagement.partials.form-group-text-area',[
                        'name' => 'text_home_catch',
                        ])
                    <button type="button" id="text-home-catch-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalTextCatch();" hidden>Valider</button>
                    <button type="button" id="text-home-catch-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForTextCatch();" hidden>Supprimer l'enregistrement</button>
                </form>
                <form role="form">
                    @include('Flooflix_websiteManagement.partials.form-group-font',[
                        'name' => 'font_home_catch',
                        ])
                    <button type="button" id="font-home-catch-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalStorageFontHomeCatch();" hidden>Valider</button>
                    <button type="button" id="font-home-catch-remove" class="btn btn-danger btn-sm mb-3" onclick="retrunSelectOptionForFontHomeCatch();" hidden>Annuler</button>
                    <button type="button" id="font-home-catch-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForFontHomeCatch();" hidden>Supprimer l'enregistrement</button>
                </form>
                <form role="form">
                    @include('Flooflix_websiteManagement.partials.form-group-color',[
                        'name' => 'color_home_catch',
                        ])
                    <button type="button" id="color-home-catch-submit" class="btn btn-success btn-sm" onclick="writeInLocalStorageColorHomeCatch();" hidden>Valider</button>
                    <button type="button" id="color-home-catch-remove" class="btn btn-danger btn-sm" onclick="retrunSelectOptionForColorHomeCatch();" hidden>Annuler</button>
                    <button type="button" id="color-home-catch-delete" class="btn btn-danger btn-sm" onclick="deleteOptionSelectedForColorHomeCatch();" hidden>Supprimer l'enregistrement</button>         
                </form>
            </div>
            <div class="col-md-3">
                <h4>Modifier le descriptif :</h4>
                <form role="form">
                    @include('Flooflix_websiteManagement.partials.form-group-text-area',[
                        'name' => 'text_home_desc',
                        ])
                    <button type="button" id="text-home-desc-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalTextDesc();" hidden>Valider</button>
                    <button type="button" id="text-home-desc-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForTextDesc();" hidden>Supprimer l'enregistrement</button>
                </form>
                <form role="form">
                    @include('Flooflix_websiteManagement.partials.form-group-font',[
                        'name' => 'font_home_desc',
                        ])
                    <button type="button" id="font-home-desc-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalStorageFontHomeDesc();" hidden>Valider</button>
                    <button type="button" id="font-home-desc-remove" class="btn btn-danger btn-sm mb-3" onclick="retrunSelectOptionForFontHomeDesc();" hidden>Annuler</button>
                    <button type="button" id="font-home-desc-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForFontHomeDesc();" hidden>Supprimer l'enregistrement</button>
                </form>
                <form role="form">
                    @include('Flooflix_websiteManagement.partials.form-group-color',[
                        'name' => 'color_home_desc',
                        ])
                    <button type="button" id="color-home-desc-submit" class="btn btn-success btn-sm" onclick="writeInLocalStorageColorHomeDesc();" hidden>Valider</button>
                    <button type="button" id="color-home-desc-remove" class="btn btn-danger btn-sm" onclick="retrunSelectOptionForColorHomeDesc();" hidden>Annuler</button>
                    <button type="button" id="color-home-desc-delete" class="btn btn-danger btn-sm" onclick="deleteOptionSelectedForColorHomeDesc();" hidden>Supprimer l'enregistrement</button>         
                </form>
            </div>
        </div>
    </article>

    <!-- Second Article -->
    <article class="mx-5 separator pb-5">
        <header class="row mt-4">
            <h2><u>Sur la deuxième bande :</u></h2>
        </header>
        <div class="row mt-3">
            <div class="col-md-4">
                <h4>Modifier l'arrière-plan :</h4>
                <form role="form" class="mt-3">
                    @include('Flooflix_websiteManagement.partials.form-group-color',[
                        'name' => 'backgroundColor_home_second_article',
                        ])
                    <button type="button" id="background-second-article-submit" class="btn btn-success btn-sm" onclick="writeInLocalStorageBackgroundSecondArticle();" hidden>Valider</button>
                    <button type="button" id="background-second-article-remove" class="btn btn-danger btn-sm" onclick="retrunSelectOptionForBackgroundSecondArticle();" hidden>Annuler</button>
                    <button type="button" id="background-second-article-delete" class="btn btn-danger btn-sm" onclick="deleteOptionSelectedForBackgroundSecondArticle();" hidden>Supprimer l'enregistrement</button>
                </form>
            </div>
            <div class="col-md-4">
                <h4>Modifier le titre :</h4>
                <form role="form">
                    @include('Flooflix_websiteManagement.partials.form-group-text',[
                        'name' => 'text_home_top',
                        ])
                        <button type="button" id="text-home-top-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalTextTop();" hidden>Valider</button>
                        <button type="button" id="text-home-top-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForTextTop();" hidden>Supprimer l'enregistrement</button>
                </form>
                <form role="form">
                    @include('Flooflix_websiteManagement.partials.form-group-font',[
                        'name' => 'font_home_top',
                        ])
                    <button type="button" id="font-home-top-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalStorageFontHomeTop();" hidden>Valider</button>
                    <button type="button" id="font-home-top-remove" class="btn btn-danger btn-sm mb-3" onclick="retrunSelectOptionForFontHomeTop();" hidden>Annuler</button>
                    <button type="button" id="font-home-top-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForFontHomeTop();" hidden>Supprimer l'enregistrement</button>
                </form>
                <form role="form">
                    @include('Flooflix_websiteManagement.partials.form-group-color',[
                        'name' => 'color_home_top',
                        ])
                    <button type="button" id="color-home-top-submit" class="btn btn-success btn-sm" onclick="writeInLocalStorageColorHomeTop();" hidden>Valider</button>
                    <button type="button" id="color-home-top-remove" class="btn btn-danger btn-sm" onclick="retrunSelectOptionForColorHomeTop();" hidden>Annuler</button>
                    <button type="button" id="color-home-top-delete" class="btn btn-danger btn-sm" onclick="deleteOptionSelectedForColorHomeTop();" hidden>Supprimer l'enregistrement</button>
                </form>
            </div>
            <div class="col-md-4">
                <h4>Pour le titre de ces films :</h4>
                <form role="form" class="mt-3">
                    @include('Flooflix_websiteManagement.partials.form-group-font',[
                        'name' => 'font_movie_home_top',
                        ])
                    <button type="button" id="font-movie-home-top-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalStorageFontMovieHomeTop();" hidden>Valider</button>
                    <button type="button" id="font-movie-home-top-remove" class="btn btn-danger btn-sm mb-3" onclick="retrunSelectOptionForFontMovieHomeTop();" hidden>Annuler</button>
                    <button type="button" id="font-movie-home-top-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForFontMovieHomeTop();" hidden>Supprimer l'enregistrement</button>
                </form>
                <form role="form">
                    @include('Flooflix_websiteManagement.partials.form-group-color',[
                        'name' => 'color_movie_home_top',
                        ])
                    <button type="button" id="color-movie-home-top-submit" class="btn btn-success btn-sm" onclick="writeInLocalStorageColorMovieHomeTop();" hidden>Valider</button>
                    <button type="button" id="color-movie-home-top-remove" class="btn btn-danger btn-sm" onclick="retrunSelectOptionForColorMovieHomeTop();" hidden>Annuler</button>
                    <button type="button" id="color-movie-home-top-delete" class="btn btn-danger btn-sm" onclick="deleteOptionSelectedForColorMovieHomeTop();" hidden>Supprimer l'enregistrement</button>
                </form>
                <form role="form">
                    @include('Flooflix_websiteManagement.partials.form-group-color-mouseover',[
                        'name' => 'color_movie_mouseover_home_top',
                        ])
                    <button type="button" id="color-movie-mouseover-home-top-submit" class="btn btn-success btn-sm" onclick="writeInLocalStorageColorMovieMouseoverHomeTop();" hidden>Valider</button>
                    <button type="button" id="color-movie-mouseover-home-top-remove" class="btn btn-danger btn-sm" onclick="retrunSelectOptionForColorMovieMouseoverHomeTop();" hidden>Annuler</button>
                    <button type="button" id="color-movie-mouseover-home-top-delete" class="btn btn-danger btn-sm" onclick="deleteOptionSelectedForColorMovieMouseoverHomeTop();" hidden>Supprimer l'enregistrement</button>
                </form>
            </div>
        </div>
        <div class="row separator azure mx-6 mt-4 mb-5"></div>
        <div class="row ml-3">
            <h4>Modifier les films affichés :</h4>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <p class="mt-4">Le 1er film :</p>
                <form role="form">
                    @include('Flooflix_websiteManagement.partials.form-group-select-movie',[
                        'name' => 'first_movie_top',
                        'number' => '1',
                        ])
                    <button type="button" id="first-movie-top-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalFirstMovieTop();" hidden>Valider</button>
                    <button type="button" id="first-movie-top-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForFirstMovieTop();" hidden>Supprimer l'enregistrement</button>
                </form>
                <form role="form">
                    <p class="mt-4">Le 4ème film :</p>
                    @include('Flooflix_websiteManagement.partials.form-group-select-movie',[
                        'name' => 'fourth_movie_top',
                        'number' => '4',
                        ])
                    <button type="button" id="fourth-movie-top-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalFourthMovieTop();" hidden>Valider</button>
                    <button type="button" id="fourth-movie-top-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForFourthMovieTop();" hidden>Supprimer l'enregistrement</button>
                </form>
            </div>
            <div class="col-md-4">
                <form role="form">
                    <p class="mt-4">Le 2ème film :</p>
                    @include('Flooflix_websiteManagement.partials.form-group-select-movie',[
                        'name' => 'second_movie_top',
                        'number' => '2',
                        ])
                        <button type="button" id="second-movie-top-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalSecondMovieTop();" hidden>Valider</button>
                        <button type="button" id="second-movie-top-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForSecondMovieTop();" hidden>Supprimer l'enregistrement</button>
                </form>
                <form role="form">
                    <p class="mt-4">Le 5ème film :</p>
                    @include('Flooflix_websiteManagement.partials.form-group-select-movie',[
                        'name' => 'fifth_movie_top',
                        'number' => '5',
                        ])
                        <button type="button" id="fifth-movie-top-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalFifthMovieTop();" hidden>Valider</button>
                        <button type="button" id="fifth-movie-top-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForFifthMovieTop();" hidden>Supprimer l'enregistrement</button>
                </form>             
            </div>
            <div class="col-md-4">
                <form role="form">
                    <p class="mt-4">Le 3ème film :</p>
                    @include('Flooflix_websiteManagement.partials.form-group-select-movie',[
                        'name' => 'third_movie_top',
                        'number' => '3',
                        ])
                        <button type="button" id="third-movie-top-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalThirdMovieTop();" hidden>Valider</button>
                        <button type="button" id="third-movie-top-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForThirdMovieTop();" hidden>Supprimer l'enregistrement</button>
                </form>
            </div>
        </div>
    </div>
    </article>

    <!-- third Article -->
    <article class="mx-5 separator pb-5">
        <header class="row mt-4">
            <h2><u>Sur la troisième bande :</u></h2>
        </header>
        <div class="row mt-3">
            <div class="col-md-4">
                <h4>Modifier l'arrière-plan :</h4>
                <form role="form" class="mt-3">
                    @include('Flooflix_websiteManagement.partials.form-group-color',[
                        'name' => 'backgroundColor_home_third_article',
                        ])
                    <button type="button" id="background-third-article-submit" class="btn btn-success btn-sm" onclick="writeInLocalStorageBackgroundThirdArticle();" hidden>Valider</button>
                    <button type="button" id="background-third-article-remove" class="btn btn-danger btn-sm" onclick="retrunSelectOptionForBackgroundThirdArticle();" hidden>Annuler</button>
                    <button type="button" id="background-third-article-delete" class="btn btn-danger btn-sm" onclick="deleteOptionSelectedForBackgroundThirdArticle();" hidden>Supprimer l'enregistrement</button>
                </form>
            </div>
            <div class="col-md-4">
                <h4>Modifier le titre :</h4>
                <form role="form">
                    @include('Flooflix_websiteManagement.partials.form-group-text',[
                        'name' => 'text_home_new',
                        ])
                        <button type="button" id="text-home-new-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalTextNew();" hidden>Valider</button>
                        <button type="button" id="text-home-new-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForTextNew();" hidden>Supprimer l'enregistrement</button>
                </form>
                <form role="form">
                    @include('Flooflix_websiteManagement.partials.form-group-font',[
                        'name' => 'font_home_new',
                        ])
                        <button type="button" id="font-home-new-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalStorageFontHomeNew();" hidden>Valider</button>
                        <button type="button" id="font-home-new-remove" class="btn btn-danger btn-sm mb-3" onclick="retrunSelectOptionForFontHomeNew();" hidden>Annuler</button>
                        <button type="button" id="font-home-new-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForFontHomeNew();" hidden>Supprimer l'enregistrement</button>
                </form>
                <form role="form"></form>
                    @include('Flooflix_websiteManagement.partials.form-group-color',[
                        'name' => 'color_home_new',
                        ])
                        <button type="button" id="color-home-new-submit" class="btn btn-success btn-sm" onclick="writeInLocalStorageColorHomeNew();" hidden>Valider</button>
                        <button type="button" id="color-home-new-remove" class="btn btn-danger btn-sm" onclick="retrunSelectOptionForColorHomeNew();" hidden>Annuler</button>
                        <button type="button" id="color-home-new-delete" class="btn btn-danger btn-sm" onclick="deleteOptionSelectedForColorHomeNew();" hidden>Supprimer l'enregistrement</button>
                </form>
            </div>
            <div class="col-md-4">
                <h4>Pour le titre de ces films :</h4>
                <form role="form" class="mt-3">
                    @include('Flooflix_websiteManagement.partials.form-group-font',[
                        'name' => 'font_movie_home_new',
                        ])
                        <button type="button" id="font-movie-home-new-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalStorageFontMovieHomeNew();" hidden>Valider</button>
                        <button type="button" id="font-movie-home-new-remove" class="btn btn-danger btn-sm mb-3" onclick="retrunSelectOptionForFontMovieHomeNew();" hidden>Annuler</button>
                        <button type="button" id="font-movie-home-new-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForFontMovieHomeNew();" hidden>Supprimer l'enregistrement</button>
                </form>
                <form role="form">
                    @include('Flooflix_websiteManagement.partials.form-group-color',[
                        'name' => 'color_movie_home_new',
                        ])
                        <button type="button" id="color-movie-home-new-submit" class="btn btn-success btn-sm" onclick="writeInLocalStorageColorMovieHomeNew();" hidden>Valider</button>
                        <button type="button" id="color-movie-home-new-remove" class="btn btn-danger btn-sm" onclick="retrunSelectOptionForColorMovieHomeNew();" hidden>Annuler</button>
                        <button type="button" id="color-movie-home-new-delete" class="btn btn-danger btn-sm" onclick="deleteOptionSelectedForColorMovieHomeNew();" hidden>Supprimer l'enregistrement</button>
                </form>
                <form role="form">
                    @include('Flooflix_websiteManagement.partials.form-group-color',[
                        'name' => 'color_movie_mouseover_home_new',
                        ])
                        <button type="button" id="color-movie-mouseover-home-new-submit" class="btn btn-success btn-sm" onclick="writeInLocalStorageColorMovieMouseoverHomeNew();" hidden>Valider</button>
                        <button type="button" id="color-movie-mouseover-home-new-remove" class="btn btn-danger btn-sm" onclick="retrunSelectOptionForColorMovieMouseoverHomeNew();" hidden>Annuler</button>
                        <button type="button" id="color-movie-mouseover-home-new-delete" class="btn btn-danger btn-sm" onclick="deleteOptionSelectedForColorMovieMouseoverHomeNew();" hidden>Supprimer l'enregistrement</button>
                </form>
            </div>
        </div>
        <div class="row separator azure mx-6 mt-4 mb-5"></div>
        <div class="row ml-3">
            <h4>Modifier les films affichés :</h4>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <p class="mt-4">Le 1er film :</p>
                <form role="form">
                    @include('Flooflix_websiteManagement.partials.form-group-select-movie',[
                        'name' => 'first_movie_new',
                        'number' => '6',
                        ])
                        <button type="button" id="first-movie-new-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalFirstMovieNew();" hidden>Valider</button>
                        <button type="button" id="first-movie-new-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForFirstMovieNew();" hidden>Supprimer l'enregistrement</button>
                </form>
                <form action="">
                    <p class="mt-4">Le 4ème film :</p>
                    @include('Flooflix_websiteManagement.partials.form-group-select-movie',[
                        'name' => 'fourth_movie_new',
                        'number' => '9',
                        ])
                        <button type="button" id="fourth-movie-new-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalFourthMovieNew();" hidden>Valider</button>
                        <button type="button" id="fourth-movie-new-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForFourthMovieNew();" hidden>Supprimer l'enregistrement</button>
                </form>
            </div>
            <div class="col-md-4">
                <form role="form">
                    <p class="mt-4">Le 2ème film :</p>
                    @include('Flooflix_websiteManagement.partials.form-group-select-movie',[
                        'name' => 'second_movie_new',
                        'number' => '7',
                        ])
                        <button type="button" id="second-movie-new-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalSecondMovieNew();" hidden>Valider</button>
                        <button type="button" id="second-movie-new-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForSecondMovieNew();" hidden>Supprimer l'enregistrement</button>
                </form>
                <form action="">
                    <p class="mt-4">Le 5ème film :</p>
                    @include('Flooflix_websiteManagement.partials.form-group-select-movie',[
                        'name' => 'fifth_movie_new',
                        'number' => '10',
                        ])
                        <button type="button" id="fifth-movie-new-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalFifthMovieNew();" hidden>Valider</button>
                        <button type="button" id="fifth-movie-new-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForFifthMovieNew();" hidden>Supprimer l'enregistrement</button>
                </form>             
            </div>
            <div class="col-md-4">
                <form role="form">
                    <p class="mt-4">Le 3ème film :</p>
                    @include('Flooflix_websiteManagement.partials.form-group-select-movie',[
                        'name' => 'third_movie_new',
                        'number' => '8',
                        ])
                        <button type="button" id="third-movie-new-submit" class="btn btn-success btn-sm mb-3" onclick="writeInLocalThirdMovieNew();" hidden>Valider</button>
                        <button type="button" id="third-movie-new-delete" class="btn btn-danger btn-sm mb-3" onclick="deleteOptionSelectedForThirdMovieNew();" hidden>Supprimer l'enregistrement</button>
                </form>
            </div>
        </div>
    </div>
    </article>
</section>
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/websiteManagement/editHomePage.js"></script>
<script src="http://127.0.0.1:8000/js/combobox.js"></script>
<script>
    $('document').ready(function() {
        document.body.style.backgroundColor = 'black';
    })
</script>