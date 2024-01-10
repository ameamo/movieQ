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
            <h1>通知一覧</h1><br><br>
            <div class="answer_notifications">
                <h1>あなたの質問に対する回答</h1>
                @foreach ($myAnswerNotifications as $myAnswerNotification)
                    <a href="/answer_read/{{ $myAnswerNotification->id }}">
                        {{ $myAnswerNotification->created_at }}
                        <br>{{ $myAnswerNotification->answer->question->movie_title}}についてのあなたの質問に回答が届きました！
                    </a><br>
                @endforeach
            </div><br><br>
            <div class="reply_notifications">
                <h1>あなたの回答に対する返信</h1>
                @foreach ($myReplyNotifications as $myReplyNotification)
                    <a href="/reply_read/{{ $myReplyNotification->id }}">
                        {{ $myReplyNotification->created_at }}
                        <br>{{ $myReplyNotification->reply->answer->question->movie_title }}についてのあなたの回答に返信が届きました！
                    </a>
                @endforeach
            </div>
        </body>
    </x-app-layout>
</html>