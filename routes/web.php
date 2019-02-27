<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route to test something
Route::get('/test', 'HomeController@test');


//-------------------------------------------------------------------------------------------------------------------------------------
// Routes to login admin
Route::get('/admin','AdminController@login')->name('admin.login');
Route::post('/admin','AdminController@authenticate')->name('admin.authenticate');

// Routes websites management by admin
Route::group(['middleware' => ['App\Http\Middleware\IsAdmin']], function () {
    Route::get("/admin/home",'AdminController@home')->name('admin.home');
    Route::get('/admin/logout','AdminController@logout')->name('admin.logout');
    Route::resource('website','WebsiteController');
    Route::resource('page','PageController');
    Route::resource('font','FontController');
    Route::resource('color','ColorController');
    Route::resource('picture','PictureController');
    Route::resource('text','TextController');
    Route::get('/pages/{website}','WebsiteController@pages')->name('website.pages');
    Route::get('/selectWebsiteForAddText','TextController@selectWebsite')->name('text.website');
    Route::post('/getPagesForAddText','TextController@getPages');
    Route::get('/createText/{id}','TextController@createText')->name('createText');
    Route::get('/unjoinFont/{page}/{font}','PageController@unjoinFont');
    Route::get('/unjoinColor/{page}/{color}','PageController@unjoinColor');
    Route::get('/unjoinPicture/{page}/{picture}','PageController@unjoinPicture');
    Route::post('/join/{page}','PageController@join')->name('page.join');
    Route::get('/pageTexts/{page}','TextController@showTextsForPage')->name('page.texts');
});

//----------------------------------------------------------------------------------------------------------------------------------------

// Routes for flooflix website
Route::get('/','HomeController@flooflix')->name('home');
Route::get('/LesCatégories','CategoryController@index')->name('categories');
Route::get('/LaCatégorie/{category}','CategoryController@showMoviesByCategory')->name('category');
Route::get('/LeFilm/{movie}','MovieController@showMovie')->name('movie');
Route::post('/ResearchMovie','MovieController@showMovieByResearch')->name('movie.research');
Route::get('/Connection','LoginController@login')->name('user.login');
Route::post('/login','LoginController@authenticate')->name('user.auth');
Route::get('/Inscription','UserController@create')->name('user.register');
Route::post('/register','UserController@store');

// Route for flooflix websites when users are authenticate
Route::group(['middleware' => ['App\Http\Middleware\Authenticate']],function (){
    Route::get('/MonCompte','UserController@showUserAccount')->name('user.account');
    Route::get('/MaCollection','UserController@showUserMoviesCollection')->name('user.collection');
    Route::get('/HistoriqueDesAchats','UserController@showPurchaseHistory')->name('purchase.history');
    Route::get('/ModifierVotreCompte','UserController@edit')->name('user.edit');
    Route::get('/AjouterUneCarteBancaire','BankCardController@create')->name('bankCard.create');
    Route::post('/AjouterUneCarteBancaire','BankCardController@store')->name('bankCard.store');
    Route::get('/ModifierVotreCarteBancaire','BankCardController@edit')->name('bankCard.edit');
    Route::post('/ModifierVotreCarteBancaire','BankCardController@update')->name('bankCard.update');
    Route::get('AjouterDesCrédits','UserController@addCredits')->name('user.credits');
    Route::post('AjouterDesCrédits','UserController@storeCredits')->name('store.credits');
    Route::get('AjouterUnFilmAuPanier/{movie}','MovieController@addMovieInShoppingCart')->name('add.movie.to.shoppingCart');
    Route::get('VotrePanier/{user}','UserController@showShoppingCart')->name('show.shoppingCart');
    Route::get('RetirerDuPanier/{movie}/{user}','UserController@removeMovieInCart')->name('remove.movie.in.cart');
    Route::get('ValiderLePanier','UserController@addMoviesToCollection')->name('add.movie.to.collection');
    Route::post('user/{user}','UserController@update')->name('user.update');
    Route::get('/logout','LoginController@logout')->name('user.logout');
});

//----------------------------------------------------------------------------------------------------------------------------------------
// Routes for flooflix website management when owner is authenticate
Route::group(['middleware' => ['App\Http\Middleware\IsOwner']], function(){
    Route::get('/GestionDuSite','OwnerController@home');
    Route::post('/researchInWebsiteManagement','MovieController@showMovieByResearchInWebsiteManagement')->name('movie.researchInWebsiteManagement');
    Route::get('/ListeDesFilms','MovieController@moviesList')->name('movies.list');
    Route::get('/ListeDesUtilisateurs','UserController@usersList')->name('users.list');
    Route::get('/ListeDesClients/{movie}','MovieController@customersList')->name('customers.list');
    Route::get('/InformationsDeLutilisateur/{user}','UserController@userInformations')->name('user.informations');
    Route::post('/InformationsDeLutilisateur','UserController@addUserByResearch')->name('user.research');
    Route::get('/SupprimerLutilisateur/{user}','UserController@deleteUser')->name('user.delete');
    Route::get('/AjouterUnFilm','MovieController@createStep1')->name('create.movie');
    Route::post('/AjouterUnFilm','MovieController@storeStep1')->name('store.movie');
    Route::get('/AjouterUnFilm/Etape2/{movie}','MovieController@createStep2')->name('create.movie.step2');
    Route::post('/AjouterUnFilm/Etape2/{movie}','MovieController@storeStep2')->name('store.movie.step2');
    Route::get('/AjouterUnFilm/Etape3/{movie}','MovieController@createStep3')->name('create.movie.step3');
    Route::post('/AjouterUnFilm/Etape3/{movie}','MovieController@storeStep3')->name('store.movie.step3');
    Route::get('/AjouterUnFilm/Etape4/{movie}','MovieController@createStep4')->name('create.movie.step4');
    Route::post('/AjouterUnFilm/Etape4/{movie}','MovieController@storeStep4')->name('store.movie.step4');
    Route::get('/AjouterUnFilm/Etape5/{movie}','MovieController@createStep5')->name('create.movie.step5');
    Route::post('/AjouterUnFilm/Etape5/{movie}','MovieController@storeStep5')->name('store.movie.step5');
    Route::get('/ModifierLeFilm/{movie}','MovieController@edit')->name('movie.edit');
    Route::get('/ModifierLaCategorie/{movie}','MovieController@editCategory')->name('edit.movie.category');
    Route::post('/ModifierLaCategorie/{movie}','MovieController@updateCategory')->name('update.movie.category');
    Route::get('/ModifierLimage/{movie}','MovieController@editPoster')->name('edit.movie.poster');
    Route::post('/ModifierLimage/{movie}','MovieController@updatePoster')->name('update.movie.poster');
    Route::get('/ModifierLeTiTre/{movie}','MovieController@editTitle')->name('edit.movie.title');
    Route::post('/ModifierLeTiTre/{movie}','MovieController@updateTitle')->name('update.movie.title');
    Route::get('/ModifierLaDurée/{movie}','MovieController@editDuration')->name('edit.movie.duration');
    Route::post('/ModifierLaDurée/{movie}','MovieController@updateDuration')->name('update.movie.duration');
    Route::get('/ModifierLaDateDeSortie/{movie}','MovieController@editReleaseDate')->name('edit.movie.releaseDate');
    Route::post('/ModifierLaDateDeSortie/{movie}','MovieController@updateReleaseDate')->name('update.movie.releaseDate');
    Route::get('/ModifierLePrixDuFilm/{movie}','MovieController@editPrice')->name('edit.movie.price');
    Route::post('/ModifierLePrixDuFilm/{movie}','MovieController@updatePrice')->name('update.movie.price');
    Route::get('/ModifierLeSynopsis/{movie}','MovieController@editSynopsis')->name('edit.movie.synopsis');
    Route::post('/ModifierLeSynopsis/{movie}','MovieController@updateSynopsis')->name('update.movie.synopsis');
    Route::get('/AjouterUnRéalisateur/{movie}','MovieController@addFilmDirector')->name('add.movie.filmDirector');
    Route::post('/AjouterUnRéalisateur/{movie}','MovieController@storeFilmDirector')->name('store.movie.filmDirector');
    Route::get('/SupprimerUnRéalisateur/{movie}/{person}','MovieController@deleteFilmDirector')->name('delete.movie.filmDirector');
    Route::get('/ModifierUnePersonne/{movie}/{person}','PersonController@edit')->name('edit.movie.person');
    Route::post('/ModifierUnePersonne/{movie}/{person}','PersonController@update')->name('update.movie.person');
    Route::get('/AjouterUnActeur/{movie}','MovieController@addActor')->name('add.movie.actor');
    Route::post('/AjouterUnActeur/{movie}','MovieController@storeActor')->name('store.movie.actor');
    Route::get('/SupprimerUnActeur/{movie}/{person}','MovieController@deleteActor')->name('delete.movie.actor');
    Route::get('/ModifierLeLienDeLaBandeAnnonce/{movie}','MovieController@editTrailerLink')->name('edit.movie.trailerLink');
    Route::post('/ModifierLeLienDeLaBandeAnnonce/{movie}','MovieController@updateTrailerLink')->name('update.movie.trailerLink');
    Route::get('/ModifierLeLienPourLaVidéo/{movie}','MovieController@editMovieLink')->name('edit.movie.movieLink');
    Route::post('/ModifierLeLienPourLaVidéo/{movie}','MovieController@updateMovieLink')->name('update.movie.movieLink');
    Route::get('/InformationsPourLeFilm/{movie}','MovieController@showMovieInformations')->name('movie.informations');
    Route::get('/GestionDesFilms','MovieController@moviesManagement');
    Route::post('/GestionDesFilms','MovieController@moviesManagement');
    Route::get('/GestionDesUtilisateurs','UserController@usersManagement');
    Route::post('/GestionDesUtilisateurs','UserController@usersManagement');
    Route::get('/GestionDesPages','OwnerController@pagesManagement');
    Route::get('/GestionDesInformationsGenerales','OwnerController@generalInformationManagement');
    Route::get('/GestionDesElementsVisuels','OwnerController@visualElementsManagement');
    Route::get('/ListeDesPolices','OwnerController@fontsList');
    Route::get('/AjouterUnePolice','OwnerController@addFont');
    Route::get('/ListeDesCouleurs','OwnerController@colorsList');
    Route::get('/AjouterUneCouleur','OwnerController@addColor');
    Route::get('/ListeDesImages','PictureController@picturesList')->name('pictures.list');
    Route::get('/AjouterUneImage','OwnerController@addPicture');
    Route::post('/AjouterUneImage','PictureController@storePictureFromManagement');
    Route::get('/ModifierLeNomDeLimage/{picture}','PictureController@editPictureName')->name('edit.picture.name');
    Route::post('UpdatePictureName/{picture}','PictureController@updatePictureName')->name('update.picture.name');
    Route::get('/ModifierLeVisuelDeLimage/{picture}','PictureController@editVisualOfPicture')->name('edit.picture.visual');
    Route::post('/MettreAjourLeVisuelDeLimage/{picture}','PictureController@updateVisualOfPicture')->name('update.picture.visual');
    Route::get('/SupprimerLimage/{picture}','PictureController@deletePicture')->name('delete.picture');
    Route::get('/CollectionDeFilmsDunUtilisateur','OwnerController@showUserMoviesCollection');
    
    // les pages modifiables
    Route::get('/ModifierLaPageAccueil','PageController@editHomePage')->name('edit.homePage');
    Route::get('/AperçuDeLaPageAccueil','PageController@showPreviewHomePage')->name('preview.homePage');

});

 

