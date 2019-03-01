@extends('Flooflix_websiteManagement.layouts.base')
@section('content')
@include('Flooflix_websiteManagement.layouts.header')
<!-- Main -->
<article role="main" class="container azure font-alfa">
    @include('Flooflix.partials.message')
    <header>
    <h1 class="mt-5 separator">La catégorie "{{ $category->genre }}"</h1>
    </header>
    <div class="row mt-5">
        <div class="col table-responsive">
            <table class="table table-light table-bordered black">
                <thead>
                    <tr>
                        <th>NOM</th>
                        <th>IMAGE</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>       
                        <td> 
                            <a href="{{ route('edit.category.genre',$category) }}" class="black hover-red">{{ $category->genre }}</a> 
                        </td>
                        <td>
                            <a href="{{ route('edit.category.picture',$category) }}">
                                <figure class="figure">            
                                    @foreach ($pictures as $picture)
                                        @if ($picture->id == $category->picture_id)    
                                            <img height="300px" width="500px" src="{{ asset($picture->style) }}" alt="{{ $category->genre }}" class="figure-img">
                                        @endif  
                                    @endforeach
                                </figure>
                            </a>
                        </td>
                        <td>
                            <a href="{{ action('CategoryController@deleteCategory',$category) }}" class="black font-alfa hover-red">Supprimer</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</article>
@include('Flooflix.layouts.scripts')
<script>
    $('document').ready(function() {
        document.body.style.backgroundColor = 'black';
    })
</script>
@endsection