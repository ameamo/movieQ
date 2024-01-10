<?php

namespace App\Http\Controllers;


use App\Models\Answer;
use App\Models\AnswerNotification;

use Illuminate\Http\Request;
use App\Http\Requests\AnswerRequest;

class AnswerController extends Controller
{
    public function answer (Answer $answer, AnswerNotification $answernotification, AnswerRequest $request)
    {
        $input = $request['answer'];
        $answer->user_id = $input["user_id"];
        $answer->question_id = $input["question_id"];
        $answer->body = $input["body"];
        $answer->save();
        $answernotification->user_id = $answer->question->user_id;
        $answernotification->answer_id = $answer->id;
        $answernotification->save();
        return redirect('/questions/' . $answer->question_id);
        //return view('Q&A.show')->with(['answer' => $answer]);
        
        
    }
    
    
    
}

