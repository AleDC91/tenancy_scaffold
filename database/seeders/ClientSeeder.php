<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\ClientTypes;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Assicurati che il ruolo 'client' esista
        if (!Role::where('name', 'client')->first()) {
            Role::create(['name' => 'client']);
        }
        $clientTypes = ClientTypes::all();

        // Ottieni tutti gli utenti che non hanno un ruolo
        $usersWithoutRole = User::whereDoesntHave('roles')->get();
        // Assegna a ciascuno di loro il ruolo 'client' e crea un record nella tabella 'clients'
        foreach ($usersWithoutRole as $user) {
            // Verifica se l'utente non è già un admin
            if (!$user->hasRole('admin')) {
                // Assegna il ruolo 'client' all'utente
                $user->assignRole('client');
        
                // Crea un nuovo record nella tabella 'clients'
                $client = new Client();
                $client->id = $user->id;
        
                // Aggiungi qui i dati relativi al cliente
                $client->regime_id = fake()->numberBetween(1, 3);
                $client->job = fake()->randomElement(['Pediatra', 'Cardiologo', 'Neurologo', 'Dentista', 'Chirurgo', 'Psichiatra', 'Dermatologo', 'Ginecologo', 'Oftamologo', 'Otorinolaringoiatra', 'Endocrinologo']);
                $client->job_description = fake()->sentence();
                $client->acquisition_date = fake()->date('Y-m-d', '2021');
                $client->annual_turnover = fake()->numberBetween(10000, 2000000);
                $client->two_years_ago_turnover = fake()->numberBetween(10000, 2000000);
                $client->last_year_turnover = fake()->numberBetween(10000, 2000000);
                $client->has_employees = fake()->boolean();
                $client->CF = fake()->bothify('??###??##?#?##?#');
                $client->properties = fake()->boolean();
                $client->clinic_address = fake()->address();
        
                // Assegna un employee utente, se disponibile
                $employeeUser = User::role('employee')->inRandomOrder()->first();
                if ($employeeUser) {
                    $client->employee_id = $employeeUser->id;
                }
        
                // Salva il record del cliente
                $client->save();
            }
        }
    }
}
