@extends('layout')

@section('title')
    Movies
@endsection

@section('content')
    <h1 class="title">Movies</h1>
    @if ($movies->count())
        <div class="box">
        @foreach($movies as $movie)
            <li>
                <a href="/movies/{{ $movie->id }}">{{ $movie->title }}, released in {{ $movie->year }} ({{ $movie->age }} {{ $movie->age > 1 ? 'years' : 'year' }} ago)</a>
            </li>
        @endforeach
        </div>
    @endif
    <div class="container">
        <a href="/movies/create">Add New Movie</a>
    </div>
@endsection