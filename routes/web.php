<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Show main page 
Route::get('/',[TaskController::class, 'index']);

//Create Task
Route::get('/tasks',[TaskController::class,'create']);
//Store Task
Route::post('/tasks/store',[TaskController::class,'store']);







