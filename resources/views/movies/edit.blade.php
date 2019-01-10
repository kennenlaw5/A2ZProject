@extends('layout')

@section('title')
    Edit Movie
@endsection

@section('content')
    <h1 class="title">Edit Movie</h1>

    <form action="/movies/{{ $movie->id }}" method="post" style="margin-bottom: 1em">
        @csrf
        @method('patch')
        <div class="box">
            <div class="field">
                <label for="title" class="label">Title</label>
                <div class="control">
                    <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" placeholder="Movie Title" value="{{ $movie->title }}">
                </div>
            </div>
            <div class="field">
                <label for="year" class="label">Release Year</label>
                <div class="control">
                    <input type="number" class="input {{ $errors->has('year') ? 'is-danger' : '' }}" name="year" placeholder="Movie Release Year" value="{{ $movie->year }}">
                </div>
            </div>
            <div class="box">
                <label for="auto_fill" class="checkbox">
                    <input type="checkbox"
                           name="auto_fill"
                           onChange="var element = document.getElementById('description');
                           if (this.checked) { element.disabled = true; }
                           else { element.disabled = false; }"
                            {{ $movie->auto_fill ? 'checked' : '' }}>
                    Auto Fill Description
                </label>
                <div class="field">
                    <label for="description" class="label">Description</label>

                    <div class="control">
                        <textarea id="description"
                                  name="description"
                                  class="textarea"
                                  placeholder="Movie Description"
                                {{ $movie->auto_fill ? 'disabled' : '' }}>{{ $movie->description }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="button is-link">Update Movie</button>
        </div>
    </form>
    @include('errors')
    <form action="/movies/{{ $movie->id }}" method="post">
        @csrf
        @method('delete')
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-danger">Delete Project</button>
            </div>
        </div>
    </form>
@endsection