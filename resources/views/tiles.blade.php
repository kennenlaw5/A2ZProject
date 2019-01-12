@if (auth()->user() && $movies->count())
    <h1 class="title">Posters</h1>
    <div class="box" style="display: block; padding-bottom: 0;">
        @foreach($movies as $movie)
            @if($movie->IMDB_href && $movie->img_src)
                <a title="{{ $movie->title }}" href="/movies/{{ $movie->id }}">
                    <div class="box poster" style="display: inline-block; margin-bottom: 1.25rem; margin-left: auto; margin-right: auto; padding-bottom: 15px">
                        <img src="{{ $movie->img_src }}">
                    </div>
                </a>
            @endif
        @endforeach
    </div>
@endif