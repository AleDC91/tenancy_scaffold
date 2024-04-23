<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class StripeController extends Controller
{
    public function index()
    {
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'company' => ['required', 'string'],
            'domain' => ['required', 'string', 'unique:domains']
        ]);

        $request->session()->put('user', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'company' => $request->company,
            'domain' => $request->domain
        ]);

        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price' => 'price_1P8degI03GN4oZwS3DHEEFlb', 
                    'quantity' => 1,
                ]
            ],
            'mode' => 'subscription',
            'success_url' => route('success'),
            'cancel_url' => route('checkout'), 
        ]);
        
        return redirect()->away($session->url);

        // return $session->id;
    }

    public function success()
    {
        $userData = session('user');
        // dd($userData);
        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']),
        ]);

        $tenant = Tenant::create([
            'name' => $userData['name'],
        ]);
        $subdomain = strtolower(trim(str_replace(' ', '', $userData['domain'])));
        
        $tenant->domains()->create([
            'domain' => $subdomain,
            'company' => $userData['company']
        ]);

        // session()->forget('user');
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

        

        // Reindirizzamento alla homepage del sottodominio
        // riscrivilo in modo piu decente
        return redirect('http://' . $subdomain . '.localhost:8000/register?token=' . $token);
    
    }
}
