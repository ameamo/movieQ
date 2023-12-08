<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>MovieQ 質問する</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head> 
    <x-app-layout>
        <body>
            <h1>どの作品について質問しますか？</h1><br>
            <form action="{{ route('search') }}" method="GET">
                @csrf
                <input type="text" name="query" placeholder="Search for movies...">
                <button type="submit">Search</button>
            </form>
            @if(isset($movies))
                @foreach($movies as $movie)
                    <a href="/input/{{ $movie['title'] }}">{{ $movie['title'] }}</a>
                    <img src="https://image.tmdb.org/t/p/w200{{ $movie['poster_path'] }}" alt="Movie Poster">
                @endforeach
                
                <!--<pre>
                    {{ print_r($movies, true) }}
                </pre>-->
                
            @endif
            
                
        </body>
    </x-app-layout>
</html>