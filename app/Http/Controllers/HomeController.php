<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(Request $request)
    {

        $tasks = Task::all()->where('deleted', '=', 0)->take(3);
        return view('home', ['tasks' => $tasks]);
    }
}
