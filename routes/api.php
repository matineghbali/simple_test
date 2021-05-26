<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\PermissionController;
use App\Http\Controllers\API\RoleController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;


Route::post('/register' , [ AuthController::class , 'register' ]);
Route::post('/login' , [ AuthController::class , 'login' ]);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout' , [ AuthController::class , 'logout' ]);
    Route::apiResource('/posts' , PostController::class);
    Route::apiResource('/permissions' , PermissionController::class);
    Route::apiResource('/roles' , RoleController::class);
    Route::get('/' , function (){
        if (Gate::allows('create-post'))
            dd(1);
        dd(2);
    });

});

