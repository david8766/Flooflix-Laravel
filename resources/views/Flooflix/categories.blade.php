@extends('Flooflix.layouts.base')
@section('content')
@include('Flooflix.layouts.header')
<!-- Main -->
<article role="main" class="pb-5 min-100" id="bg-categories">
    <div class="row separator mx-5">
        <header>
        <h1 class="mt-5" id="categories-title"></h1>
        </header>
    </div>
    @forelse ($categories as $tab)
        <div class="row mt-5 mx-5">
            @foreach ($tab as $category)
                <div class="col-md-4">
                <a href="{{ route('category',[$category->genre]) }}">
                        <figure class="figure">            
                            @foreach ($pictures as $picture)
                                @if ($picture->id == $category->picture_id)    
                                    <img height="300px" width="500px" src="{{ asset($picture->style) }}" alt="" class="figure-img">
                                @endif  
                            @endforeach
                            <figcaption class="fig-caption links">{{ $category->genre }}</figcaption>
                        </figure>
                    </a>
                </div>
            @endforeach  
        </div>      
    @empty
        <p class="font-alfa azure mt-5 text-center">Pas de catégories enregistrées</p>
    @endforelse
</article>
@include('Flooflix.layouts.footer')
@include('Flooflix.layouts.varJS')
@include('Flooflix.layouts.scripts')
<script src="http://127.0.0.1:8000/js/flooflix/categories.js"></script>
@endsection
