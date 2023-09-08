<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subiecte>
 */
class SubiecteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ["Ciclism", "Skateboarding", "Golf", "Fitness",
            "Automobilistica", "Mod sanatos de viata", "Culinarie",
            "Business", "IT", "Stiinta", "Stiri"];
//
        static $typeIndex = 0;
        if($typeIndex > count($types)){
            $typeIndex = 0;
        }

        $type = $types[$typeIndex];
        $typeIndex++;

        return [
            "titlu" => $type
        ];
    }
}
