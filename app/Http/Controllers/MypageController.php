<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;

class MypageController extends Controller
{
    public function mypage ()
    {
        return view('mypage.home');
    }
    public function questions (Question $question)
    {
        $userId = Auth::id();
        $myQuestions = $question->where('user_id', '=', $userId)->orderBy('created_at', 'DESC')->get();
        return view('mypage.questions')->with(['myQuestions' => $myQuestions]);
    }
    public function answers (Answer $answer)
    {
        $userId = Auth::id();
        $myAnswers = $answer->where('user_id', '=', $userId)->orderBy('created_at', 'DESC')->get();
        return view('mypage.answers')->with(['myAnswers' => $myAnswers]);
    }
}
