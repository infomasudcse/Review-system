<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Rules\Turnstile;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $blockedDomains = [
			'korper.nl',
		 	'thn.org',
			'null.net',
			'projectdimensions.com'
		];

		$emailDomain = substr(strrchr($request->email, "@"), 1);

		if (in_array($emailDomain, $blockedDomains)) {
			return response()->json(['error' => 'Registration not allowed.'], 403);
		}

		$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
			'cf-turnstile-response' => ['required', new Turnstile],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'plan' => 'trial', // default free plan
            'trial_ends_at' => Carbon::now()->addDays(14),
            'is_subscribed' => false,
            'subscription_ends_at' => null,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
