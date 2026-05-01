<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;

Route::get('/', [HomeController::class, 'index']);

Route::resource('/todo', TodoController::class)->only(['store', 'update', 'destroy']);
Route::put('/reordertodos', [TodoController::class, 'reorder']);