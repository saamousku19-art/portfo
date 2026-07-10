<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Illuminate\View\View;

class AdminPasswordResetController extends Controller
{
    public function showForgotForm(): View
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        if (strtolower($request->email) !== strtolower(config('app.admin_email', env('ADMIN_EMAIL', 'admin@example.com')))) {
            return back()->with('success', 'Si cet e-mail correspond a votre compte admin, un lien de reinitialisation a ete envoye.');
        }

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_THROTTLED) {
            return back()->withErrors(['email' => __($status)]);
        }

        return back()->with('success', 'Si cet e-mail correspond a votre compte admin, un lien de reinitialisation a ete envoye.');
    }

    public function showResetForm(Request $request, string $token): View
    {
        return view('auth.reset-password', [
            'email' => $request->query('email'),
            'token' => $token,
        ]);
    }

    public function reset(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', PasswordRule::min(8)],
        ]);

        if (strtolower($request->email) !== strtolower(config('app.admin_email', env('ADMIN_EMAIL', 'admin@example.com')))) {
            return back()->withErrors(['email' => 'Ce lien ne correspond pas au compte admin.']);
        }

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, string $password): void {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', 'Mot de passe reinitialise. Vous pouvez vous connecter.')
            : back()->withErrors(['email' => __($status)]);
    }
}
