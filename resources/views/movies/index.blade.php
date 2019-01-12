@extends('layout')

@section('title')
    Movies
@endsection

@section('content')
    <h1 class="title">Movies</h1>
    @if ($movies->count())
        <div class="box">
            @foreach($movies as $movie)
                <div class="level" style="margin-bottom: 0">
                    <div class="level-left text-zoom">
                        <li>
                            <a href="/movies/{{ $movie->id }}">{{ $movie->title }}, released in {{ $movie->year }} ({{ $movie->age }})</a>
                        </li>
                    </div>
                </div>
            @endforeach
        </div>
        @include('tiles')
    @endif
    <div class="level">
        <div class="level-left poster">
            <a href="/movies/create">Add New Movie</a>
        </div>
    </div>
@endsection