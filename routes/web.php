<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Show main page 
Route::get('/',[TaskController::class, 'index']);


Route::middleware('auth')->group(function () {

// Show Create Form
Route::get('/tasks/create',[TaskController::class,'create']);

// Create Task
Route::post('/tasks/store',[TaskController::class,'store']);

// Claim Task 
Route::post('/tasks/{task}/claim',[TaskController::class,'claim'])->name('tasks.claim');

// Finish Task
Route::post('/tasks/{task}/finish',[TaskController::class,'finish'])->name('tasks.finish');

// Remove Task
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.delete');

// Show Claimed Tasks 
Route::get('/claimed-tasks',[TaskController::class, 'claimed'])->name('tasks.claimed');

// Update Task
Route::put('/tasks/{task}',[TaskController::class, 'update'])->name('tasks.update');

// Show Update Page
Route::get('/tasks/{task}/edit',[TaskController::class, 'edit'])->name('tasks.edit');


});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
