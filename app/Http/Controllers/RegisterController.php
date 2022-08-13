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
        // create the user
        //var_dump(request()->all()); lehet így is csekkolni

        //de így is
        //return request()->all();


        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => ['required', 'min:7', 'max:255']  //igy is lehet.
        ]);

        //dd('success validation succeeded'); csak akkor jut el ide, ha minden mező rendesen lett kitöltve.

        //ezzel titkosítjuk
        $attributes['password'] = bcrypt($attributes['password']);




        //letrehozzuk az adatbázisban, majd egy valtozóba belerakjuk.
        $user = User::create($attributes);


        //login the user in
        auth()->login($user);

        //lehet így is, vagy oda berakni a return végére.
        //session()->flash('success', 'Your account has been created.');

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
