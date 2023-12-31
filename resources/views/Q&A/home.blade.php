<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>MovieQ</title>

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
            <div class="question_index">
                @foreach($questions as $question)
                    <h1>
                        <a href="/questions/{{ $question->id }}">
                            {{ $question->movie_title }}<br>
                            {{ \Illuminate\Support\Str::limit($question->body, 80) }}
                        </a>
                    </h1>
                    <br>
                @endforeach
            </div>
            <div class="paginate">
                {{ $questions->links() }}
            </div>
                
            
        </body>
    </x-app-layout>
</html>
