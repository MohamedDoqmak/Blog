<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store(RegisterRequest $request)
    {
        $attributes = $request->validated();
        $user = User::create($attributes);
        auth()->login($user);
        return redirect('/')->with('success', 'Your account has been created');
    }
}
