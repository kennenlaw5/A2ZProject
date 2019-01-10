@extends('layout')
@section('title')
    {{ $movie->title }}
@endsection

@section('content')
    <div class="box">
        <div class="container" style="display: flex">
            @if($movie->IMDB_href && $movie->img_src)
                <a href="{{ $movie->IMDB_href }}">
                    <img src="{{ $movie->img_src }}" style="margin-right: 1em">
                </a>
            @endif
            <div class="content" style="padding-left: 1em">
                <h1 class="title">{{ $movie->title }}, {{ $movie->year }}</h1>
                <p>{{ $movie->description }}</p>
            </div>
        </div>
    </div>

    @can('update', $movie)
        <div class="content">
            <p>
                <a href="/movies/{{ $movie->id }}/edit">Edit</a>
            </p>
        </div>
    @endcan

@endsection