<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {

        //validation pass,fail
        request()->validate([
            'name' => ['required', 'min:5', "max:20"],
            'username' => ['required', 'min:5', "max:20"],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8']
        ]);

        $user = new User();
        $user->name = request('name');
        $user->username = request('username');
        $user->email = request('email');
        $user->password = request('password');
        $user->save();

        auth()->login($user);

        return redirect('/')->with('success', 'Welcome ' . $user->name);
    }
}
