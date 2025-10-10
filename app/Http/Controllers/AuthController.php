<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Mostrar formulario de registro
    public function showRegister()
    {
        return view('auth.register');
    }

    // Procesar registro
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Registro exitoso, bienvenido!');
    }

    // Mostrar formulario de login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Procesar login
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // 🔑 mantiene la sesión activa
        return redirect()->intended('/admin/productos')
            ->with('success', 'Bienvenido de nuevo!');
    }

    return back()->withErrors([
        'email' => 'Credenciales inválidas.',
    ])->onlyInput('email');
}


    // Cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Sesión cerrada.');
    }
}
