<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'tasks' => Task::all()
        ]);
    }
    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
       $taskForm = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);
        Task::create($taskForm);
        return redirect('/')->with(['success' => 'Task Added!']);
    } 
}