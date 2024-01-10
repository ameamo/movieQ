<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReplyRequest;
use App\Models\Reply;
use App\Models\ReplyNotification;

class ReplyController extends Controller
{
    public function reply (Reply $reply, ReplyNotification $replynotification, ReplyRequest $request)
    {
        $input = $request['reply'];
        $reply->user_id = $input["user_id"];
        $reply->answer_id = $input["answer_id"];
        $reply->body = $input["body"];
        $reply->save();
        $replynotification->user_id = $reply->answer->user_id;
        $replynotification->reply_id = $reply->id;
        $replynotification->save();
        
        
        return redirect('/questions/' . Reply::find($reply->id)->answer->question_id);
    }
}
