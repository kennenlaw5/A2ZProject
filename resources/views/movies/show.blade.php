@extends('layout')
@section('title')
    {{ $movie->title }}
@endsection

@section('content')
    <div class="box" style="padding-bottom: 15px">
        <div class="container" style="display: flex">
            @if($movie->IMDB_href && $movie->img_src)
                <a class="poster" title="View on IMDB" href="{{ $movie->IMDB_href }}">
                    <img src="{{ $movie->img_src }}" style="margin-right: 2em">
                </a>
            @endif
            <div class="content" style="margin-left: 1em; padding-right: 2.5em">
                <h1 class="title" style="margin-bottom: 0.25em">{{ $movie->title }}, {{ $movie->year }}</h1>
                {{--<h2 style="font-size: 1.5em; margin-top: 0;">Description</h2>--}}
                <div class="box"><p>{{ $movie->description }}</p></div>
            </div>
        </div>
    </div>

    @can('update', $movie)
        <div class="level">
            <div class="level-left poster">
                <a href="/movies/{{ $movie->id }}/edit"><button class="button is-info">Edit</button></a>
            </div>
        </div>
    @endcan

@endsection