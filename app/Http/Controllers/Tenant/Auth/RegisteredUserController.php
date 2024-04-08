<?php

namespace App\Http\Controllers\Tenant\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request)
    {
        if ($request->has('token')) {

            $token = urldecode($request->input('token'));
            $userData = json_decode(Crypt::decrypt($token), true);
            $expiration = $userData['expirationTime'];

            if (!Carbon::parse($expiration)->isPast()) {

                $user = User::create([
                    'name' => $userData['user']['name'],
                    'email' => $userData['user']['email'],
                    'password' => $userData['password'],
                ]);
                $this->seedRoles();
                $this->seedPermissions();

                $user->assignRole('admin');

                $host = request()->getHost();
                $parts = explode('.', $host);
                $domainName = $parts[0];

                $ImagesPath = public_path('domains/' . $domainName . $user->id . '/images');

                // valuta servizio di filesystem esterno come amazon s3, perchè così non è scalabile

                if (!File::isDirectory($ImagesPath)) {
                    File::makeDirectory($ImagesPath, 0775, true, true);
                }

                // Effettua l'accesso automatico dell'utente appena creato
                Auth::login($user);

                // Reindirizza dopo il login
                return redirect('/');
            }
        } else {
            // Se non è presente un token, mostra la view con il form di registrazione
            return view('tenant.auth.register');
        }
    }

    protected function seedRoles()
    {
        Artisan::call('db:seed', [
            '--class' => 'TenantRoleSeeder',
            '--force' => true,
        ]);
    }

    protected function seedPermissions()
    {
        Artisan::call('db:seed', [
            '--class' => 'TenantPermissionSeeder',
            '--force' => true,
        ]);
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
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('client');

        event(new Registered($user));

        Auth::login($user);

        // $domain = $tenant->domains->first()->domain;

        // Reindirizzamento alla homepage del sottodominio
        // riscrivilo in modo piu decente
        return redirect('/dashboard');
    }
}
