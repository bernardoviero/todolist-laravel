<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function update(Request $request)
    {
        $task = Task::findOrFail($request->taskId);
        $task->is_done = $request->status;
        $task->save();
        return ['success' => true];
    }

    public function index(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('login');
    }

    public function register(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('register');
    }

    public function register_action(Request $request)
    {
        /*
            Regras para registro:

            Usuario tem que ter nome composto
            Email tem que ser UNICO
            Todos os campos são OBRIGATÓRIOS
            Password com no minimo 8 caracteres.
        */
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);


        $data = $request->only('name', 'email', 'password');

        $data['password'] = Hash::make($data['password']);

        $userCreated = User::create($data);
        $userCreated->save();
        return redirect()->route('home');
    }

    public function login_action(Request $request)
    {

        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($validator)) {
            return redirect()->route('home');
        }
        dd(Auth::attempt($validator));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
