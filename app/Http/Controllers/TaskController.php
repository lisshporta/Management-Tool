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

        $taskForm['creator_id'] = auth()->id();

        Task::create($taskForm);
        return redirect('/')->with(['success' => 'Task Added!']);
    } 


public function claim(Task $task)
{
    $task->claimed_at = now(); 
    
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
    $task->finished_at = now(); 

    $task->update(['status' => 'Finished']);
    return redirect('/claimed-tasks')->with('success', 'Task Marked as Finished!');
}

public function destroy(Task $task)
{
    if ($task->user_id != auth()->id()){
        abort('403', 'Unauthorized Action');
    }
    $task->delete();
    return redirect('/claimed-tasks')->with('success', 'Task Removed!');
}

public function edit(Task $task)
{
    return view('tasks.update', ['task' => $task]);
}

public function update(Request $request, Task $task)
{
    $this->authorize('update', $task);

    $taskUpdate = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
    ]);

    $task->update($taskUpdate);

    return redirect('/claimed-tasks')->with(['success' => 'Task Updated!']);
}

public function sortByUnclaimed() 
{
    $tasks = Task::whereNull('user_id')->get();
    return view('welcome', ['tasks' => $tasks]);
}

}