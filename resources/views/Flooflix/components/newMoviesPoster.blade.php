<div class="col text-center">
    <a href="{{ route('movie',[$movie->title]) }}">
        <figure class="figure">
            @foreach ($pictures as $picture)
                @if ($picture->id == $movie->picture_id)
                <img width="150px" height="250px" src="{{ asset($picture->style) }}" alt="{{ $movie->title }}" class="img-fluid figure-img image">
                @endif
            @endforeach  
            <figcaption class="fig-caption new-movie">{{ $movie->title }}</figcaption>
        </figure>
    </a>
</div>  