<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permisiuni>
 */
class PermisiuniFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ["Utilizator", "Moderator", "Administrator", "Owner"];

        static $typeIndex = 0; // Static variable to keep track of the index

        if ($typeIndex >= count($types)) {
            $typeIndex = 0; // Reset the index if it goes beyond the array length
        }

        $type = $types[$typeIndex];
        $typeIndex++; // Increment the index for the next call

        return [
            "imputerniciri" => $type,
        ];
    }

}
