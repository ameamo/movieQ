<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReplyRequest;
use App\Models\Reply;

class ReplyController extends Controller
{
    public function reply (Reply $reply, ReplyRequest $request)
    {
        $input = $request['reply'];
        $reply->user_id = $input["user_id"];
        $reply->answer_id = $input["answer_id"];
        $reply->body = $input["body"];
        $reply->save();
        
        return redirect('/questions/' . Reply::find($reply->id)->answer->question_id);
    }
}
