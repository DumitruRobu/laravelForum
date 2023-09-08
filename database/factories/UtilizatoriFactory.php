<?php

namespace Database\Factories;

use App\Models\Permisiuni;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Utilizatori>
 */
class UtilizatoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nume"=>$this->faker->name,
            "gen"=>$this->faker->randomElement(['Masculin', 'Feminin']),
            "imagine"=> $this->faker->imageUrl,
	        "imputerniciri_id"=> Permisiuni::get()->random()->id
        ];
    }
}
