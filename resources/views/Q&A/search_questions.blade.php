<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>MovieQ 質問する</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head> 
    <x-app-layout>
        <body><br>
            <div class="search_questions">
                <h1>質問を検索</h1>
                <form action="{{ route('searchQuestions') }}" method="GET">
                    @csrf
                    <input type="text" name="query" placeholder="作品名を入力">
                    <button type="submit">検索</button>
                </form>
            </div><br><br>
            <div class="movies">
                @if(isset($movies))
                    @foreach($movies as $movie)
                        <a href="/lists/{{ $movie['title'] }}">{{ $movie['title'] }}</a>
                        <img src="https://image.tmdb.org/t/p/w200{{ $movie['poster_path'] }}" alt="Movie Poster">
                    @endforeach
                @endif
            </div>
        </body>
    </x-app-layout>
</html>