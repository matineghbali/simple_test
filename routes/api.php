<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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
Route::get('/' , function (){
    if (Gate::allows('create-post'))
        dd(1);
    dd(2);
})->middleware('auth:sanctum');

Route::post('/register' , [ AuthController::class , 'register' ]);
Route::post('/login' , [ AuthController::class , 'login' ]);
Route::get('/logout' , [ AuthController::class , 'logout' ])->middleware('auth:sanctum');
Route::apiResource('/posts' , PostController::class)->middleware('auth:sanctum');

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return 11;
//    return $request->user();
//});

