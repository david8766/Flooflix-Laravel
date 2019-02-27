@extends('admin.layouts.base')
@section('content')
<!-- Main -->
    <article role="main" class="container azure font-alfa">
        <header>
            <h1 class="mt-5 separator">{{ __('Liste des textes') }}</h1>
        </header>
        @include('admin.partials.message')
        <div class="row mt-5">
            <div class="col table-responsive">
                <table class="table table-light table-bordered black">
                    <thead>
                        <tr>
                            <th>{{ __('Site') }}</th>
                            <th>{{ __('Page') }}</th>
                            <th>{{ __('Référence') }}</th>
                            <th colspan="3">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($texts as $text)                            
                        <tr>
                            <td>
                                @if ($text->page_id == '')
                                    {{ 'pas de site enregistré' }}
                                @else
                                    @foreach ($pages as $page)
                                        @if ($page->id == $text->page_id)
                                            @foreach ($websites as $website)
                                                @if ($website->id == $page->website_id)
                                                    <a href="{{ route('website.pages', [$website]) }}" class="black" id="hover-red">{{ $website['name'] }}</a>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if ($text->page_id == '')
                                    {{ 'pas de page enregistrée' }}
                                @else
                                    @foreach ($pages as $page)
                                        @if ($page->id == $text->page_id)
                                            <a href="{{ action('PageController@show', $page) }}" class="black" id="hover-red">{{ $page->name }}</a>
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                            <td>{{ __($text['title']) }}</td>
                            <td>
                                <a href="{{ action('TextController@show', $text) }}" class="btn btn-success">{{ __('Voir') }}</a>
                            </td>
                            <td>
                                <a href="{{ action('TextController@edit', $text) }}" class="btn btn-warning">{{ __('Modifier') }}</a>
                            </td>
                            <td>
                                <form action="{{action('TextController@destroy', $text)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit">{{ __('Supprimer') }}</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                            <td colspan="6">{{ __('pas de texte enregistré') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row"></div>
        <a href="/selectWebsiteForAddText" class="azure" id="hover-red">{{ __('Ajouter un texte') }}</a>
        </div>
        <hr class="bg-white">
        <div class="row">
            <a href="/admin/home" class="azure" id="hover-red">{{ __("Retour à l'accueil") }}</a> 
        </div>
    </article>  
@endsection