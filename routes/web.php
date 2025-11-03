<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('complete', [App\Http\Controllers\CompletionController::class, 'complete']);

Route::get('posts', [App\Http\Controllers\PostController::class, 'index']);