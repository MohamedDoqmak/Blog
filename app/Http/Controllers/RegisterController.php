<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'min:5', 'max:15'],
            'username' => ['required', 'min:5', 'max:15',Rule::unique('users','username')],
            'email' => ['required', 'email', 'max:255',Rule::unique('users','email')],
            'password' => ['required', 'min:5', 'max:255'],
        ]);
        User::create($attributes);
        return redirect('/')->with('success','Your account has been created');
    }
}
