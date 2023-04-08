<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //
    public function index(Request $request)
    {
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        $data['categories'] = $categories;

        return view('task.create', $data);
    }

    public function edit(Request $request)
    {
        $id = $request->id;

        $task = Task::find($id);
        if (!$task) {
            return redirect(route('home'));
        }

        $categories = Category::all();
        $data['categories'] = $categories;

        $data['task'] = $task;
        return view('task.edit', $data);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $task = Task::find($id);

        if ($task) {
            $task->deleted = 1;
            $task->save();
        }
        return redirect(route('home'));
    }

    public function create_action(Request $request)
    {
        // Get the currently authenticated user
        $user = Auth::user()->id;

        $task = new Task();
        $task->title = $request->input('title');
        $task->category_id = $request->input('category_id');
        $task->description = $request->input('description');
        $task->due_date = $request->input('due_date');
        $task->user_id = $user;
        $task->save();

        return redirect(route('home'));
    }

    public function edit_action(Request $request)
    {
        $request_data = $request->only(['title', 'due_date', 'category_id', 'description']);
        $task = Task::find($request->id);

        if (!$task) {
            return redirect(route('home'));
        }
        $task->update($request_data);
        $task->save();

        return redirect(route('home'));
    }
}
