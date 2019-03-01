<div class="col text-center">
    <a href="{{ route('movie',[$movie->title]) }}">
        <figure class="figure">
            @foreach ($pictures as $picture)
                @if ($picture->id == $movie->picture_id)
                <img src="{{ asset($picture->style) }}" alt="{{ $movie->title }}" class="figure-img image">
                @endif
            @endforeach  
            <figcaption class="fig-caption top-movie">{{ $movie->title }}</figcaption>
        </figure>
    </a>
</div>