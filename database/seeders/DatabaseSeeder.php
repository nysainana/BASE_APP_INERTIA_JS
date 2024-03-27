<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\TypeTarif;
use App\Enums\TypeTarifReduction;
use App\Models\Offre;
use App\Models\Societe;
use App\Models\Tarif;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->admin()->create([
            'name' => 'Ny Sainana',
            'email' => 'manjaka.nyshainana@gmail.com',
        ]);
        Societe::factory()->create();
    }
}
