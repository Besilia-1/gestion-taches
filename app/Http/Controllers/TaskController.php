<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $tasks = $query->paginate(5);
        $categories = Category::all();

        return view('tasks.index', compact('tasks', 'categories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|string',
            'due_date' => 'nullable|date',
            'category_id' => 'required|exists:categories,id',
        ]);

        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $categories = Category::all();
        return view('tasks.edit', compact('task', 'categories'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|string',
            'due_date' => 'nullable|date',
            'category_id' => 'required|exists:categories,id',
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée avec succès');
    }
}
