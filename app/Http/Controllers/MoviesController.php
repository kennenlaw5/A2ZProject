<?php

namespace App\Http\Controllers;

use App\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $movies = Movie::all();
        $maxYear = Carbon::now()->year;
        foreach ($movies as $movie) {
//            $movie->age = $maxYear - $movie->year;
//            $movie->age = Carbon::now()->year($movie->year)->diffForHumans();
        }
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store()
    {
        $maxYear = Carbon::now()->year;
        $attributes = \request()->validate([
            'title' => 'required',
            'year' => ['required', 'integer', 'max:' . $maxYear],
            'auto_fill' => 'max:2',
            'description' => 'max:255'
        ]);
        $attributes = $this->getMovieInfo($attributes);

        Movie::create($attributes);

        return redirect('/movies');
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        $this->authorize('update', $movie);
        return view('movies.edit', compact('movie'));
    }

    public function update(Movie $movie)
    {
        $this->authorize('update', $movie);
        $maxYear = Carbon::now()->year;

        $attributes = \request()->validate([
            'title' => 'required',
            'year' => ['required', 'integer', 'max:' . $maxYear],
            'auto_fill' => 'max:2',
            'description' => 'max:255'
        ]);
        $attributes = $this->getMovieInfo($attributes);

        $movie->update($attributes);

        return redirect('/movies');
    }

    public function destroy(Movie $movie)
    {
        $this->authorize('update', $movie);
        $movie->delete();

        return redirect('/movies');
    }

    public function getMovieInfo($attributes)
    {
        if (array_key_exists('auto_fill', $attributes)) {
            $attributes['auto_fill'] = true;
        } else {
            $attributes += ['auto_fill' => false];
        }

        $parsedTitle = str_replace(' ','+', $attributes['title']);
        $html = file_get_contents('https://www.imdb.com/find?ref_=nv_sr_fn&q=' . $parsedTitle . '+%28' . $attributes['year'] . '%29&s=all');
        $target = strpos($html, 'a href="', strpos($html, 'class="findResult odd"')) + 8;
        $targetEnd = strpos($html, '"', $target);
        $href = 'https://www.imdb.com' . substr($html, $target,$targetEnd-$target);
        $target = strpos($html, '>', strpos($html, 'a href="', $target)) + 1;
        $targetEnd = strpos($html, '<', $target);
        $title = substr($html, $target,$targetEnd-$target);

        $parsedTitle = explode('+', $parsedTitle);
        $partialMatch = false;

        foreach ($parsedTitle as $titlePart) {
            if (strpos($title, $titlePart) || strpos($title, $titlePart) === 0) {
                $partialMatch = true;
            }
        }

        if ($partialMatch) {
            $html = file_get_contents($href);
            $target = strpos($html,'src="', strpos($html, 'class="poster"')) + 5;
            $targetEnd = strpos($html, '"', $target);
            $image = substr($html, $target,$targetEnd-$target);
            if ($attributes['auto_fill']) {
                $target = strpos($html, 'class="summary_text"', $target) + 21;
                $targetEnd = strpos($html, '<', $target);
                $description = preg_replace('/\n\s++/', '', substr($html, $target,$targetEnd-$target));
                $attributes['description'] = $description;
            }
        } else {
            $href = false;
            $image = false;
            if ($attributes['auto_fill']) { $attributes['description'] = 'No Description Found'; }
        }
        $attributes += [
            'IMDB_href' => $href,
            'img_src' => $image,
            'owner_id' => auth()->id()
        ];
        return $attributes;
    }
}
