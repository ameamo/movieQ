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
            <!--urlからタイトル名を取得-->
            @php
                $currentUrl = url()->current();
                $extractedString = basename(parse_url($currentUrl, PHP_URL_PATH));
                $decodeString = urldecode($extractedString);
            @endphp
            
            <p>作品タイトル</p>
            <h1>{{ $decodeString }}</h1><br>
            <p>質問内容</p>
            <form action="{{ route('store') }}" method="POST">
                @csrf
                <input type="hidden" name="question[user_id]" value="{{ auth()->check() ? auth()->user()->id : null }}">
                <input type="hidden" name="question[movie_title]" value="{{ $decodeString }}">
                <textarea name="question[body]" placeholder="enter your question.">{{ old('question.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('question.body') }}</p>
                <input type="submit" value="保存"/>
            </form>
        </body>
    </x-app-layout>
</html>