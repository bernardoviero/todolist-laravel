<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $request->date ? $filteredDate = $request->date : $filteredDate = date('Y-m-d');

        $carbonDate = Carbon::createFromDate($filteredDate);
        $data['date_as_string'] = $carbonDate->translatedFormat('d') . ' de ' . ucfirst($carbonDate->translatedFormat('M'));
        $data['date_prev_button'] = $carbonDate->addDay(-1)->format('Y-m-d');
        $data['date_next_button'] = $carbonDate->addDay(2)->format('Y-m-d');

        $idUsuario = Auth::user()->id;
        $tasks = Task::whereDate('due_date', $filteredDate)->where('user_id', $idUsuario)->get();
        $authUser = Auth::user();

        return view('home', ['tasks' => $tasks, 'authUser' => $authUser], $data);
    }
}
