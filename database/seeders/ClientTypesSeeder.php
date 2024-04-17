<?php

namespace Database\Seeders;

use App\Models\ClientTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientTypes = [
            ["name" => "uno"],
            ["name" => "due"],
            ["name" => "tre"],
            ["name" => "quattro"],
            ["name" => "cinque"]
        ];

        foreach ($clientTypes as $clientType) {
            ClientTypes::create($clientType);
        }
    }
}
