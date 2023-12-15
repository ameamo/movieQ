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
            <div class="delete">
                <form action="/questions/{{ $question->id }}" id="form_{{ $question->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteQuestion({{ $question->id }})">delete</button>
                </form><br>
            </div>
            <div class="answer_input">
                <form action="/answer" method="POST">
                    @csrf
                    <input type="hidden" name="answer[user_id]" value="{{ auth()->check() ? auth()->user()->id : null }}">
                    <input type="hidden" name="answer[question_id]" value="{{ $question->id }}">
                    <textarea name="answer[body]" placeholder="enter your answer.">{{ old('answer.body') }}</textarea>
                    <p class="body__error", style="color:red">{{ $errors->first('answer.body') }}</p>
                    <input type="submit" value="投稿する"/>
                </form><br><br>
            </div>
            <div class="answers">
                <h1>Answer</h1><br>
                @foreach($question->answers as $eachAnswer)
                    <h2>ユーザー名：{{ $eachAnswer->user->name }}</h2>
                    <p>{{ $eachAnswer->body }}</p><br>
                @endforeach
            </div>
            <script>
                function deleteQuestion(id) {
                    'use strict'
                        
                    if (confirm("削除すると復元できません。\n本当に削除しますか？")) {
                        document.getElementById(`form_${id}`) .submit();
                    }
                }
                    
            </script>
        </body>
    </x-app-layout>
</html>