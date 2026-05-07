<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()
            ->tasks()
            ->latest()
            ->get();

        return view('dashboard', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        auth()->user()->tasks()->create([
            'title' => $request->title
        ]);

        return redirect()->back();
    }

    public function update($id)
    {
        $task = Task::findOrFail($id);

        $task->is_done = !$task->is_done;

        $task->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        Task::destroy($id);

        return redirect()->back();
    }
}