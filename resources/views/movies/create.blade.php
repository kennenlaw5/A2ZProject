@extends('layout')

@section('title')
    Add Movie
@endsection

@section('content')
    <h1 class="title">Add New Movie</h1>

    <form action="/movies" method="post">
        @csrf
        <div class="box">
            <div class="field">
                <label for="title" class="label">Title</label>
                <div class="control">
                    <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" placeholder="Movie Title" value="{{ old('title') }}">
                </div>
            </div>
            <div class="field">
                <label for="year" class="label">Release Year</label>
                <div class="control">
                    <input type="number" class="input {{ $errors->has('year') ? 'is-danger' : '' }}" name="year" placeholder="Movie Release Year" value="{{ old('year') }}">
                </div>
            </div>
            <div class="box">
                    <label class="checkbox box checkbox-zoom" style="display: inline-block; margin-bottom: 0.5em; padding: 10px">
                        <input type="checkbox"
                               name="auto_fill"
                               onChange="var element = document.getElementById('description');
                               if (this.checked) { return element.disabled = true; }
                               return element.disabled = false;">
                        Auto Fill Description
                    </label>
                <div class="field">
                    <label for="description" class="label">Description</label>

                    <div class="control">
                        <textarea id="description" name="description" class="textarea" placeholder="Movie Description">{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="button is-link poster">Add Movie</button>
        </div>
        @include('errors')
    </form>
@endsection