<?php
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::resource('projects', ProjectController::class);
Route::resource('tasks', TaskController::class);

Route::get('/', function () {
    return view('welcome');
});
