<?php

namespace Database\Factories;

use App\Models\PointDeVente;
use App\Models\Societe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Societe>
 */
class SocieteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'LE PETIT CINOCHE',
            "tel" => null,
            "address" => null,
            "city" => 'Toamasina',
            "mail" => null,
            "text_ticket" => 'Bonne visualisation',
            "logo" => null
        ];
    }
}
