<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        $categories = Category::all();
        return view('tasks.index', compact('tasks', 'categories'));
    }

    public function save(Request $request){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:pending,in-progress,completed',
            'category_id' => 'required|exists:categories,id',
        ]);
        Task::create($request->all());

        return redirect('/')->with('success', 'Task added successfully');
    }

    public function edit(Task $task){
        $categories = Category::all();
        return view('tasks.edit', compact('task', 'categories'));
    }

    public function update(Request $request, Task $task){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:pending,in-progress,completed',
            'category_id' => 'required|exists:categories,id',
        ]);
        $task -> update($request->all());
        return redirect('/')->with('success', 'Task updated successfully');
    }

    public function delete(Task $task){
        $task -> delete();
        return redirect('/')->with('success', 'Task deleted successfully');
    }
        
}
