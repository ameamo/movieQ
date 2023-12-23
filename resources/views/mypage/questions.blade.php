<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>MovieQ</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head> 
    <x-app-layout>
        <body>
            <h1>投稿履歴</h1>
            <a href="/mypage/questions">＜質問＞</a>
            <a href="/mypage/answers">＜回答＞</a><br><br>
            @foreach($myQuestions as $myQuestion)
                <a href="/questions/{{ $myQuestion->id }}">
                    <p>{{ $myQuestion->movie_title }}</p>
                    <p>{{ \Illuminate\Support\Str::limit($myQuestion->body, 80) }}</p><br>
                </a>
            @endforeach
                
        </body>
    </x-app-layout>
</html>