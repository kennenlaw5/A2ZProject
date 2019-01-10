@extends('layout')

@section('title')
    A2Z Project
@endsection

@section('content')
    <h1 class="title">Home</h1>

    <div class="box">
        <li>
            <a href="/movies">View Movies</a>
        </li>
        <li>
            <a href="/movies/create">Add New Movie</a>
        </li>
    </div>
@endsection