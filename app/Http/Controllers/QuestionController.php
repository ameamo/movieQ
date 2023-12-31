<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    public function homepage (Question $question)
    {
        return view('Q&A.home')->with(['questions' => $question->getPaginateByLimit()]);
    }
    
    public function create () 
    {
        return view('Q&A.question-creation-search');
    }
    
    public function search (Request $request)
    {
        $query = $request->input('query');
        $token = config('services.tmdb.token');
        $client = new \GuzzleHttp\Client();
        
        $response = $client->request('GET', "https://api.themoviedb.org/3/search/movie?query={$query}&language=ja", [
            'headers' => [
                'Authorization' => "Bearer {$token}",
                'accept' => 'application/json',
            ],
        ]);
        $movies = json_decode($response->getBody(), true);
        return view('Q&A.question-creation-search')->with(['movies' => $movies['results']]);
    }
    public function searchQuestions (Request $request)
    {
        $query = $request->input('query');
        $token = config('services.tmdb.token');
        $client = new \GuzzleHttp\Client();
        
        $response = $client->request('GET', "https://api.themoviedb.org/3/search/movie?query={$query}&language=ja", [
            'headers' => [
                'Authorization' => "Bearer {$token}",
                'accept' => 'application/json',
            ],
        ]);
        $movies = json_decode($response->getBody(), true);
        return view('Q&A.search_questions')->with(['movies' => $movies['results']]);
    }
    
    public function lists (Request $request, $title, Question $question)
    {
        $matchedQuestions = $question->where('movie_title', '=', $title)->orderBy('created_at', 'DESC')->get();
        
        return view('Q&A.questions_by_movie')->with(['matchedQuestions' => $matchedQuestions]);
    }
    
    public function input (Question $question)
    {
        return view('Q&A.question-creation-input')->with(['question' => $question]);
    }
    
    public function store (Question $question, QuestionRequest $request)
    {
        $input = $request['question'];
        $question->user_id = $input["user_id"];
        $question->movie_title = $input["movie_title"];
        $question->body = $input["body"];
        $question->save();
        return redirect('/questions/' . $question->id);
    }
    
    public function show (Question $question)
    {
        return view('Q&A.show')->with(['question' => $question]);
    }
    
    public function edit (Question $question)
    {
        return view('Q&A.edit')->with(['question' => $question]);
    }
    
    public function update (Question $question, QuestionRequest $request)
    {
        $input = $request['question'];
        $question->body = $input["body"];
        $question->save();
        return redirect('/questions/' . $question->id);
    }
    
    public function delete (Question $question)
    {
        $question->delete();
        return redirect('/');
    }
}
