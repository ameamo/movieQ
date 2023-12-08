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
            <h1>編集画面</h1>
            <p>title</p>
            <h2>{{ $question->movie_title }}</h2>
            <form action="/questions/{{ $question->id }}" method="POST">
                @csrf
                @method('PUT')
                <p>content</p>
                <textarea name="question[body]">{{ $question->body }}</textarea>
                <input type="submit" value="保存">
            </form>
        </body>
    </x-app-layout>
</html>