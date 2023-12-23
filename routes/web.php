<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ReplyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(QuestionController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'homepage')->name('homepage');
    Route::get('/search', 'search')->name('search');
    Route::get('/searchQuestions', 'searchQuestions')->name('searchQuestions');
    Route::get('/lists/{title}', 'lists')->name('lists');
    Route::get('/input/{str}', 'input')->name('input');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/questions/{question}', 'show')->name('show');
    Route::put('/questions/{question}', 'update')->name('update');
    Route::get('/questions/{question}/edit', 'edit')->name('edit');
    Route::delete('questions/{question}', 'delete')->name('delete');
});

Route::post('/answer', [AnswerController::class, 'answer']);

Route::post('/reply', [ReplyController::class, 'reply']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
