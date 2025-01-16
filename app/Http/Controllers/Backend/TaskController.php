<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
{
    // Fetch tasks in descending order of creation date
    $tasks = Task::with('user')->orderBy('created_at', 'desc')->get();
    return view('backend.tasks.index', compact('tasks'));
}

    /**
     * Show the form for creating a new task.
     */
    public function create()
    {
        $users = User::all(); // Get all users for assigning tasks
        return view('backend.tasks.create', compact('users'));
    }

    /**
     * Store a newly created task in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required|in:pending,in_progress,completed',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    /**
     * Show the form for editing a task.
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id); // Fetch the task to edit
        $users = User::all(); // Fetch users for the assign dropdown
        return view('backend.tasks.edit', compact('task', 'users'));
    }

    /**
     * Update the specified task in storage.
     */

     
     public function update(Request $request, $id)
     {
         $task = Task::findOrFail($id);
     
         // Validate the request data
         $request->validate([
             'title' => 'required|string|max:255',
             'description' => 'required|string',
         ]);
     
         // Update the task fields
         $task->title = $request->title;
         $task->description = $request->description;
         $task->save();
     
         // Redirect with a success message
         return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
     }
     

    /**
     * Remove the specified task from storage.
     */
    public function destroy($id)
{
    // Find the task by ID or fail if it doesn't exist
    $task = Task::findOrFail($id);

    // Delete the task
    $task->delete();

    // Redirect back to the tasks index with a success message
    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
}
}
