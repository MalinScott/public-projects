<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{
    //
    public function store()
    {

        // validate request
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //authenticate and log user in using provided input
        if (!auth()->attempt($attributes)) {
            return back()
                ->withInput()
                ->withErrors(['email' => 'Your provided credentials could not be verified.']);
        }

        session()->regenerate();
        // redirect with a success flash message
        return redirect('/')->with('success', 'Successfully Logged In');

        /*        throw ValidationException::withMessages([
                    'email' => 'Your provided credentials could not be verified.'
                ]);*/


    }

    public function create()
    {

        return view('sessions.create');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Successfully Logged Out');
    }
}
