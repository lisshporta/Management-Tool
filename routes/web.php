<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Show main page 
Route::get('/',[TaskController::class, 'index']);

// Show Create Form
Route::get('/tasks/create',[TaskController::class,'create']);

// Create Task
Route::post('/tasks/store',[TaskController::class,'store']);