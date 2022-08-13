<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * @throws ValidationException
     */
    public function store()
    {
        // validate the request
        $attributes = request()->validate([
           'email' => 'required|email',
            'password' => 'required'
        ]);

        // attempt to authenticate and log in the user
        // based on the provided credentials
        if(! auth()->attempt($attributes))
        {
            /*
          auth failed
          return back()
              ->withInput()
              ->withErrors(['email' => 'Your provided credentials could not be verified.']); // $errors
            ez is egy módja, de lehet így is:
            ez szebb szerintem.
        */

            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);

        }


        // dd($attributes);

        //session fixation behatolás ellen.
        session()->regenerate();

        // redirect with a success flash message
        return redirect('/')->with('success', 'Welcome Back!');
    }

    public function destroy()
    {
        //dd('log the user out');
        auth()->logout();

        return redirect('/')-> with('success', 'Goodbye!');
    }
}
