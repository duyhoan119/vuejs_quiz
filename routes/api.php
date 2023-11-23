<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuesionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserQuizController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('subject')->group(function(){
    Route::get('/',[SubjectController::class,'getAll']);
    Route::get('/{id}',[SubjectController::class,'findId']);
    Route::post('/',[SubjectController::class,'store']);
    Route::put('/{id}',[SubjectController::class,'save']);
    Route::delete('/{id}',[SubjectController::class,'destroy']);
});
Route::prefix('quiz')->group(function(){
    Route::get('/',[QuizController::class,'getAll']);
    Route::get('/{id}',[QuizController::class,'findId']);
    Route::get('subject/{id}',[QuizController::class,'findBySubjectId']);
    Route::post('/',[QuizController::class,'store']);
    Route::put('/{id}',[QuizController::class,'save']);
    Route::delete('/{id}',[QuizController::class,'destroy']);
});

Route::prefix('quesion')->group(function(){
    Route::get('/',[QuesionController::class,'index']);
    Route::get('/{id}',[QuesionController::class,'findId']);
    Route::get('quiz/{id}',[QuesionController::class,'findByQuizId']);
    Route::get('quized/{id}',[QuesionController::class,'findByQuizedId']);
    Route::post('/',[QuesionController::class,'store']);
    Route::put('/{id}',[QuesionController::class,'save']);
    Route::delete('/{id}',[QuesionController::class,'destroy']);
});

Route::prefix('answer')->group(function(){
    Route::get('/',[AnswerController::class,'index']);
    Route::get('/{id}',[AnswerController::class,'findId']);
    Route::post('/',[AnswerController::class,'store']);
    Route::put('/{id}',[AnswerController::class,'save']);
    Route::delete('/{id}',[AnswerController::class,'destroy']);
});

Route::prefix('quized')->group(function(){
    Route::get('/',[UserQuizController::class,'index']);
    Route::post('/',[UserQuizController::class,'store']);
});

Route::prefix('history')->group(function(){
    Route::get('/',[UserQuizController::class,'index']);
    Route::post('/',[UserQuizController::class,'store']);
});