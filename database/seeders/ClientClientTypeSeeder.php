<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\ClientClientType;
use App\Models\ClientTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientClientTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ottenere tutti i clienti e tutti i tipi di cliente
        $clients = Client::all();
        $clientTypes = ClientTypes::all();

        // Ciclare su ogni cliente
        foreach ($clients as $client) {
            // Determinare casualmente il numero di tipi di cliente da associare a questo cliente (da 1 a N)
            $numberOfClientTypes = rand(1, $clientTypes->count());

            // Ottenere un subset casuale di tipi di cliente
            $randomClientTypes = $clientTypes->random($numberOfClientTypes);

            // Associare questo cliente ai tipi di cliente selezionati
            foreach ($randomClientTypes as $clientType) {
                // Creare una nuova riga nella tabella pivot client_client_type
                ClientClientType::create([
                    'client_id' => $client->id,
                    'client_type_id' => $clientType->id,
                ]);
            }
        }
    }
}
