@extends('admin.layouts.base')
@section('content')
<!-- Main -->
    <article role="main" class="container azure font-alfa">
        <header>
            <h1 class="mt-5 separator">{{ __('Informations sur la page  '. $page['name']) }}</h1>
        </header>
        @if (\Session::has('message'))
            <div class="alert alert-success">
                <p class="p-0 m-0">{{ __(\Session::get('message')) }}</p>
            </div><br />
        @endif
        <div class="row mt-5">
            <div class="col table-responsive">
                <table class="table table-light table-bordered black">
                    <thead>
                        <tr>
                            <th>{{ __('Nom') }}</th>
                            <th>{{ __('URL') }}</th>
                            <th>{{ __('Site') }}</th>
                            <th colspan="2">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>                                                  
                        <tr>
                            <td>{{ __($page['name']) }}</td>
                            <td>{{ __($page['url']) }}</td>
                            <td><a href="{{ route('website.pages', [$website]) }}" class="black" id="hover-red">{{ $website['name'] }}</a></td>
                            <td>
                                <a href="{{ action('PageController@edit', $page) }}" class="btn btn-warning">{{ __('Modifier') }}</a>
                            </td>
                            <td>
                                <form action="{{ action('PageController@destroy', $page) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit">{{ __('Supprimer') }}</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <h4>{{ __("Liste des polices d'écriture utilisées pour cette page :") }}</h4> 
        </div>
        <div class="row mt-2">
            <div class="col table-responsive">
                <table class="table table-light table-bordered black">
                    <thead>
                        <tr>
                            <th>{{ __('Nom') }}</th>
                            <th>{{ __('Lien') }}</th>
                            <th>{{ __('Style') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($page->fonts()->get() as $font)                            
                        <tr>
                            <td style="{{ $font['style'] }}">{{ __($font['name']) }}</td>
                            <td style="{{ $font['style'] }}">{{ __($font['link']) }}</td>
                            <td style="{{ $font['style'] }}">{{ __($font['style']) }}</td>
                            <td>
                                <a href="{{ action('PageController@unjoinFont',[$page ,$font] ) }}" class="btn btn-danger">{{ __('Supprimer') }}</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">{{ __('pas de polices associés à cette page') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <h4>{{ __("Liste des couleurs utilisées pour cette page :") }}</h4> 
        </div><div class="row mt-2">
            <div class="col table-responsive">
                <table class="table table-light table-bordered black">
                    <thead>
                        <tr>
                            <th>{{ __('Nom') }}</th>
                            <th>{{ __('Rgb') }}</th>
                            <th>{{ __('Opacité') }}</th>
                            <th>{{ __('Aperçu') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($page->colors()->get() as $color)                            
                        <tr>
                            <td>{{ __($color['name']) }}</td>
                            <td>{{ __($color['rgb']) }}</td>
                            <td>{{ __($color['opacity']) }}</td>
                        <td><div style="height: 3rem; width: 5rem; background-color: {{ $color['rgb'] }}; opacity: {{$color['opacity'] }} "></div></td>
                            <td>
                                <a href="{{ action('PageController@unjoinColor', [$page ,$color]) }}" class="btn btn-danger">{{ __('Supprimer') }}</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">{{ __('pas de couleurs associées à cette page') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <h4>{{ __("Liste des images utilisées pour cette page :") }}</h4> 
        </div>
        <div class="row mt-2">
            <div class="col table-responsive">
                <table class="table table-light table-bordered black">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Dossier de stockage publique</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @forelse($page->pictures()->get() as $picture)                            
                        <tr>
                            <td>{{ __($picture['name']) }}</td>
                            <td>{{ __($picture['link']) }}</td>
                            <td><div style="height: 3rem; width: 5rem; background-image: url('{{asset($picture['style'])}}');background-repeat: no-repeat;background-size: cover;"></div></td>
                            <td>
                                <a href="{{ action('PageController@unjoinPicture', [$page ,$picture]) }}" class="btn btn-danger">{{ __('Suprimer') }}</a>
                            </td>
                        </tr>
                        @empty
                            <tr>
                            <td colspan="4">{{ __("pas d'images associées à cette page") }}</td>
                            </tr>
                        @endforelse
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <a href="{{ action('TextController@showTextsForPage', $page ) }}" class="azure" id="hover-red">{{ __("Voir la liste des textes") }}</a> 
        </div>
        <hr class="bg-white">
        <div class="row">
            <h4>{{ __("Associer une police d'écriture à cette page :") }}</h4>
        </div>
        <div class="row">                        
           <form action="{{ action('PageController@join', $page) }}" role="form" class="mt-2" method="POST">
               @csrf
               @include('admin.partials.form-group-select', [
               'title' => __('Sélectionnez une police:'),
               'name' => 'fonts',
               'empty' => __('Veuilez enregistrer une police au préalable'),
               ])
               @component('admin.components.button')
                   @lang('Enregistrer')
               @endcomponent
           </form>
        </div>
        <div class="row">
            <h4>{{ __("Associer une couleur à cette page") }}</h4> 
        </div>
        <div class="row">                        
           <form action="{{ action('PageController@join', $page) }}" role="form" class="mt-2" method="POST">
               @csrf
               @include('admin.partials.form-group-select', [
               'title' => __('Sélectionnez une couleur:'),
               'name' => 'colors',
               'empty' => __('Veuilez enregistrer une couleur au préalable'),
               ])
               @component('admin.components.button')
                   @lang('Enregistrer')
               @endcomponent
           </form>
        </div>
        <div class="row">
            <h4>{{ __("Associer une image à cette page") }}</h4> 
        </div>
        <div class="row">                        
           <form action="{{ action('PageController@join', $page) }}" role="form" class="mt-2" method="POST">
               @csrf
               @include('admin.partials.form-group-select', [
               'title' => __('Sélectionnez une image:'),
               'name' => 'pictures',
               'empty' => __('Veuilez enregistrer une image au préalable'),
               ])
               @component('admin.components.button')
                   @lang('Enregistrer')
               @endcomponent
           </form>
        </div>
        <div class="row">
            <a href="/selectWebsiteForAddText" class="azure" id="hover-red">{{ __("Ajouter du texte") }}</a> 
        </div>
        <hr class="bg-white">
        <div class="row">
            <a href="{{ route('page.index') }}" class="azure" id="hover-red">{{ __("Retour à la liste de l'ensemble des pages contenues dans la base de données") }}</a> 
        </div>
        <div class="row">
            <a href="{{ route('website.pages', [$website]) }}" class="azure" id="hover-red">{{ __("Voir la liste des pages pour ce site") }}</a> 
        </div>
        <hr class="bg-white">
        <div class="row">
            <a href="/admin/home" class="azure" id="hover-red">{{ __("Retour à l'accueil") }}</a> 
        </div>
    </article>  
@endsection