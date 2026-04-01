<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/posts' , [PostController::class , 'index']);
Route::get('/post/{id}', [PostController::class, 'show'])-> where ('id', '[0-9]+');
Route::get('/post/create', [PostController::class, 'create']);
Route::post('/post', [PostController::class , 'store']);
Route::get('/post/{id}/edit', [PostController::class, 'edit']);
Route::put('/post/{id}', [PostController::class , 'update']);
Route::delete('/post/{id}', [PostController::class , 'destroy']);





