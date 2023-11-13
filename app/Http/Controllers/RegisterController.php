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
        $attributes = request()->validate([
            'name' => ['required', 'min:7', 'max:15'],
            'username' => ['required', 'min:7', 'max:15'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:6', 'max:255'],
        ]);
        User::create($attributes);
        return redirect('/');
    }
}
