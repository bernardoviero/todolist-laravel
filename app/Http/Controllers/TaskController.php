<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

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
        return view('task.edit');
    }

    public function delete(Request $request)
    {
    }

    public function create_action(Request $request)
    {
        // Get the currently authenticated user
        $user = 1;

        $task = new Task();
        $task->title = $request->input('title');
        $task->category_id = $request->input('category_id');
        $task->description = $request->input('description');
        $task->due_date = $request->input('due_date');
        $task->user_id = $user;
        $task->save();

        return redirect(route('home'));
    }
}
