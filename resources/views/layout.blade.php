<!doctype html>
<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
        <style>
            .navbar {
                margin-left: auto;
                margin-right: 0;
            }
        </style>
    </head>
    <body>
    <div class="box navbar">
        <a href="/"><button class="button is-link" style="margin-right: 1em">Home</button></a>
        <a href="/movies"><button class="button is-link" style="margin-right: 1em">Movies</button></a>
        <a href="/movies/create"><button class="button is-link" style="margin-right: 1em">Add Movie</button></a>
    </div>
    <div class="container">
        @yield('content')
    </div>
    </body>
</html>