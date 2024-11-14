<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function crear() 
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //Modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);

        //Validación en la BD 
        $request->validate([
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        //Registrar en la BD mediante en el modelo
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password) //encripta la contraseña
        ]);

        //Autenticar un Usuario es como la variable session que usabamoss
        //Primera Forma
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);
        //Segunda Forma
        Auth::attempt($request->only('email', 'password'));
        
        //Rederigir
        return redirect()->route('post.index', Auth::user()->username);
    }
}
