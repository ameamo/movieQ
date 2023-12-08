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
            <br>
            <div class="title">
                <p>title</p>
                <h1>{{ $question->movie_title }}</h1>
            </div><br><br>
            <div class="question-content">
                <h1>Question</h1><br>
                <h2>ユーザー名：{{ $question->user->name }}</h2>
                <p>{{ $question->body }}</p>
            </div><br>
            <div class="edit">
                @if(Auth::check() && Auth::user()->id == $question->user->id)
                    <a href="/questions/{{ $question->id }}/edit">編集</a>
                @endif
            </div>
        </body>
    </x-app-layout>
</html>