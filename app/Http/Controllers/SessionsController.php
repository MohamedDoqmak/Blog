<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionsRequest;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function store(SessionsRequest $request)
    {
        $credentials = $request->validated();

        if (auth()->attempt($credentials)) {
            session()->regenerate();
            return redirect('/')->with('success', 'Successfully logged in');
        }

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);

    }
    public function create()
    {
        return view('sessions.create');
    }
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbey');
    }
}
