<?php

namespace Database\Seeders;

use App\Models\ClientAnnualDeadline;
use App\Models\YearlyDeadline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientAnnualDeadlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            // Seleziona tutte le scadenze annuali
            $deadlines = YearlyDeadline::all();
    
            // Per ogni scadenza, trova tutti i clienti associati a ciascun tipo di cliente e crea i record associati
            foreach ($deadlines as $deadline) {
                // Seleziona tutti i tipi di cliente associati a questa scadenza
                $clientTypes = $deadline->clientTypes;
    
                // Per ogni tipo di cliente, trova i clienti corrispondenti e crea i record nella tabella client_annual_deadlines
                foreach ($clientTypes as $clientType) {
                    // Seleziona tutti i clienti associati a questo tipo di cliente
                    $clients = $clientType->clients;
    
                    // Per ogni cliente, crea un record nella tabella client_annual_deadlines
                    foreach ($clients as $client) {
                        // Verifica se il cliente ha già un record associato a questa scadenza
                        if (!ClientAnnualDeadline::where('client_id', $client->id)->where('deadline_id', $deadline->id)->exists()) {
                            // Se non esiste, crea un nuovo record
                            ClientAnnualDeadline::create([
                                'client_id' => $client->id,
                                'deadline_id' => $deadline->id,
                                'status' => 'pending', // Puoi impostare lo status desiderato
                            ]);
                        }
                    }
                }
            }
        }
    }
}
