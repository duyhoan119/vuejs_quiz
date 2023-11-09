<?php

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
    Route::post('/',[QuizController::class,'store']);
    Route::put('/{id}',[QuizController::class,'save']);
    Route::delete('/{id}',[QuizController::class,'destroy']);
    Route::prefix('quesion')->group(function(){
        Route::delete('/{id}',[SubjectController::class,'destroy']);
    });
});
Route::prefix('quized')->group(function(){
    Route::get('/',[UserQuizController::class,'index']);
    Route::post('/',[UserQuizController::class,'store']);
});