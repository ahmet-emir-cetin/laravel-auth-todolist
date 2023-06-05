<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [PostController::class, 'index']);
Route::post('/todo-add', [PostController::class, 'create'])->name('todo.add');
Route::get('/todo-delete/{id}', [PostController::class, 'delete'])->name('todo.delete');
Route::get('/todo-update/{id}', [PostController::class, 'updateIsComplated'])->name('todo.update');
Route::post('/todo-edit/{id}', [PostController::class, 'edit'])->name('todo.edit');




Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
