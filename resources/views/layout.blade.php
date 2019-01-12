<!doctype html>
<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
        <script
                src="https://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous"></script>
        <style>
            .poster, .text-zoom, .checkbox-zoom {
                transition: transform .15s;
            }
            .poster:hover {
                transform: scale(1.1);
            }
            .text-zoom:hover {
                transform: scale(1.1) translateX(.5em);
            }
            .checkbox-zoom:hover {
                transform: scale(1.025);
            }
        </style>
    </head>
    <body>
    <nav class="level box">
        @if(!Route::is('main'))
            <a href="/"><button class="button is-link poster" style="margin-right: 1em">Home</button></a>
        @endif
        @if(!Route::is('movies.index'))
            <a href="/movies"><button class="button is-link poster" style="margin-right: 1em">Movies</button></a>
        @endif
        @if(!Route::is('movies.create') && auth()->user())
            <a href="/movies/create"><button class="button is-link poster" style="margin-right: 1em">Add Movie</button></a>
        @endif

        <div style="margin-left: auto; display: flex">
            @if (auth()->user())
                <div class="poster" style="padding-right: 5px">
                    <a class="button is-text" style="text-decoration: underline;" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <div class="poster">
                    <a class="button is-text" style="text-decoration: underline;" href="{{ route('login') }}">{{ __('Login') }} </a>
                </div>
                <p style="padding-top: 5px; padding-left: 1.5px; padding-right: 2.5px;">|</p>
                <div class="poster">
                    <a class="button is-text" style="text-decoration: underline;" href="{{ route('register') }}"> {{ __('Register') }}</a>
                </div>
            @endif
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    </body>
</html>