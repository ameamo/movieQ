<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\AnswerNotification;
use App\Models\ReplyNotification;

class NotificationController extends Controller
{
    public function notification (AnswerNotification $answerNotification, ReplyNotification $replyNotification)
    {
        $userId = Auth::user()->id;
        $myAnswerNotifications = $answerNotification->where('user_id', '=', $userId)->where('read', '=', '0')->orderBy('created_at', 'DESC')->get();
        $myReplyNotifications = $replyNotification->where('user_id', '=', $userId)->where('read', '=', '0')->orderBy('created_at', 'DESC')->get();
        //dd($myNotifications);
        return view('notification.notification')->with(['myAnswerNotifications' => $myAnswerNotifications, 'myReplyNotifications' => $myReplyNotifications]);
    }
    
    public function answer_read (AnswerNotification $answerNotification)
    {
        $answerNotification->read = true;
        $answerNotification->save();
        return redirect('/questions/' . AnswerNotification::find($answerNotification->id)->answer->question_id);
    }
    public function reply_read (ReplyNotification $replyNotification)
    {
        $replyNotification->read = true;
        $replyNotification->save();
        return redirect('/questions/' . $replyNotification->reply->answer->question_id);
    }
}
