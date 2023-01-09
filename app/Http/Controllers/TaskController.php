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
            'description' => 'required',
            'type' => 'required',
        ]);
        Task::create($taskForm);
        return redirect('/')->with(['success' => 'Task Added!']);
    } 


public function claim(Task $task)
{
    if ($task->user_id != null) {
        return redirect('/')->with('success', 'Task is already claimed!');
    } else {
        $task->update(['user_id' => auth()->id()]);
        $task->update(['status' => 'Claimed']);
        return redirect('/')->with('success', 'Task successfully claimed!');
    }
}

public function claimed()
{
    $claimedTasks = Task::where('user_id', auth()->id())->get();

    return view('tasks/claimed-tasks', compact('claimedTasks'));
}

public function finish(Task $task)
{
    $task->update(['status' => 'Finished']);
    return redirect('/claimed-tasks')->with('success', 'Task Marked as Finished!');

}

}