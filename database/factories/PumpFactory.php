<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pump>
 */
class PumpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'source_identification' => $this->faker->randomElement(['Single', 'Duel']),
            'location_of_pump' => $this->faker->text(50),
            'dma' => $this->faker->text(50),
            'zone' => $this->faker->randomElement(['Zone-1', 'Zone-2', 'Zone-3', 'Zone-4', 'Zone-5', 'Zone-6', 'Zone-7', 'Zone-8', 'Zone-9', 'Zone-10']),
            'year_of_installation' => $this->faker->numberBetween(1970, date('Y')),
            'depth' => $this->faker->text(50),
            'chlorination_unit_condition' => $this->faker->randomElement(['Running', 'Not running']),
            'pump_running_condition' => $this->faker->randomElement(['Running', 'Not running']),
        ];
    }
}
