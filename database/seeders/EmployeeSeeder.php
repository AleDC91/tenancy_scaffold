<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Otteniamo gli utenti con il ruolo 'employee'
        $employees = User::role('employee')->get();

        // Iteriamo sugli utenti e creiamo un record nella tabella employees per ciascuno di essi
        foreach ($employees as $employee) {
            // Creiamo un nuovo record nella tabella employees
            $employeeRecord = new Employee();
            $employeeRecord->user_id = $employee->id;

            // Generiamo dati casuali per il dipendente
            $employeeRecord->hire_date = now()->subDays(rand(1, 365)); // Data di assunzione nell'ultimo anno
            $employeeRecord->salary = rand(20000, 80000); // Stipendio casuale tra 20000 e 80000
            $employeeRecord->position = $this->getRandomPosition();

            // Salviamo il record del dipendente nel database
            $employeeRecord->save();
        }
    }

    // Metodo per ottenere casualmente una posizione per il dipendente
    private function getRandomPosition()
    {
        $positions = [
            'Commercialista',
            'Revisore contabile',
            'Consulente fiscale',
            'Responsabile amministrativo',
            'Esperto in risorse umane',
            'Assistente contabile',
            'Segretario/a',
            'Specialista in tasse e imposte',
            'Analista finanziario',
            'Assistente fiscale',
            'stagista'
        ];

        return $positions[array_rand($positions)];
    
    }
}
