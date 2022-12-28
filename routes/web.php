<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Show main page 
Route::get('/',[TaskController::class, 'index']);


