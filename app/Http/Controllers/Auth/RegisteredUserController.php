<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'company' => ['required', 'string'],
            'domain' => ['required', 'string', 'unique:domains']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $tenant = Tenant::create([
            'name' => $request->name,
        ]);
        $subdomain = strtolower(trim(str_replace(' ', '', $request->domain)));
        
        $tenant->domains()->create([
            'domain' => $subdomain,
            'company' => $request->company
        ]);

        $user->tenants()->attach($tenant->id);

        event(new Registered($user));

        Auth::login($user);

        $validityPeriod = 1; // Durata del token in minuti
        $expirationTime = now()->addMinutes($validityPeriod);
        $userData = [
            "user" => $user,
            "password" => $user->password,
            'expirationTime' => $expirationTime
        ];

        $token = Crypt::encrypt(json_encode($userData));

        // dd($session_user);

        // Reindirizzamento alla homepage del sottodominio
        // riscrivilo in modo piu decente
        return redirect('http://' . $subdomain . '.localhost:8000/register?token=' . $token);
    }
}
