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
            <div class="search_questions">
                <h1>質問を検索</h1>
                <form action="{{ route('searchQuestions') }}" method="GET">
                    @csrf
                    <input type="text" name="query" placeholder="作品名を入力">
                    <button type="submit">検索</button>
                </form>
            </div><br>
            <!--urlからタイトル名を取得-->
            @php
                $currentUrl = url()->current();
                $extractedString = basename(parse_url($currentUrl, PHP_URL_PATH));
                $decodeString = urldecode($extractedString);
            @endphp<br>
            
            <h1>{{ $decodeString }}</h1><br><br>
            <div class="list_of_qustions">
                @foreach($matchedQuestions as $matchedQuestion)
                    <a href="/questions/{{ $matchedQuestion->id }}">{{ $matchedQuestion->body }}</a><br><br>
                @endforeach
            </div>
            
        </body>
    </x-app-layout>
</html>