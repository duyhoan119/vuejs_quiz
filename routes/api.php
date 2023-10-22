<?php

use App\Http\Controllers\SubjectController;
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
