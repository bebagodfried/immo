<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the login form for authentication
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Check for user credentials
     */
    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.properties.index'));
        }

        return back()->withErrors([
            'email' => 'Email incorrect',
        ])->onlyInput('email');
    }

    /**
     * Show the user register form
     */
    public function register()
    {
        return view('auth.register');
    }
    public function doRegister(RegisterRequest $request)
    {
        $user = $request->validated();

        $admin = User::create([
            'name'      => $user['name'],
            'email'     => $user['email'],
            'password'  => Hash::make($user['password']),
        ]);

        auth()->login($admin);

        if (auth()->check()):
            return redirect()->route('admin.index')->with('success', "Bienvenue $admin->name");
        endif;

        return redirect()->route('register');
    }

    /**
     * Logout an authenticated user
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return to_route('login')->with('success', 'Vous êtes maintenant déconnecté');
    }
}
