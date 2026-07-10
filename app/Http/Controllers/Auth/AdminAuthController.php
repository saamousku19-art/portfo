<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminAuthController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Vérifie que l'email saisi correspond à celui configuré dans .env
        if (strtolower($credentials['email']) !== strtolower(config('app.admin_email', env('ADMIN_EMAIL', 'admin@example.com')))) {
            return back()
                ->withErrors(['email' => 'Ces identifiants ne correspondent a aucun compte admin.'])
                ->onlyInput('email');
        }

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.experiences.index'))
                ->with('success', 'Connexion reussie.');
        }

        return back()
            ->withErrors(['email' => 'Ces identifiants ne correspondent a aucun compte admin.'])
            ->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Vous etes deconnecte.');
    }
}