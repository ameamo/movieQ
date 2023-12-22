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
