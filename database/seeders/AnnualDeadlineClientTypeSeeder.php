<?php

namespace Database\Seeders;

use App\Models\AnnualDeadlineClientType;
use App\Models\ClientTypes;
use App\Models\YearlyDeadline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnualDeadlineClientTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ottenere tutti i tipi di cliente e tutte le scadenze annuali
        $clientTypes = ClientTypes::all();
        $yearlyDeadlines = YearlyDeadline::all();

        // Ciclare su ogni scadenza annuale
        foreach ($yearlyDeadlines as $deadline) {
            // Determinare casualmente il numero di tipi di cliente da associare a questa scadenza annuale (da 1 a N)
            $numberOfClientTypes = rand(1, $clientTypes->count());

            // Ottenere un subset casuale di tipi di cliente
            $randomClientTypes = $clientTypes->random($numberOfClientTypes);

            // Associare questa scadenza annuale ai tipi di cliente selezionati
            foreach ($randomClientTypes as $clientType) {
                // Creare un nuovo record nella tabella pivot con le chiavi esterne appropriate
                AnnualDeadlineClientType::create([
                    'annual_deadline_id' => $deadline->id,
                    'client_type_id' => $clientType->id,
                ]);
            }
        }
    }
}
