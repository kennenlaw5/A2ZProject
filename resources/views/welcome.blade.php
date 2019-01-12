@extends('layout')

@section('title')
    A2Z Project
@endsection

@section('content')
    <h1 class="title">Home</h1>

    <div class="box">
        <div class="level" style="margin-bottom: 0">
            <div class="level-left text-zoom">
                <li class="text-zoom">
                    <a href="/movies">View Movie Details</a>
                </li>
            </div>
        </div>
        @if(auth()->user())
            <div class="level" style="margin-bottom: 0">
                <div class="level-left text-zoom">
                    <li class="text-zoom">
                        <a href="/movies/create">Add New Movie</a>
                    </li>
                </div>
            </div>
        @endif
    </div>
    @if (auth()->user())
        @include('tiles')
    @endif
@endsection