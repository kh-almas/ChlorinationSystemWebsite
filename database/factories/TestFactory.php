<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Test>
 */
class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pump_id' => 1,
            'running_status' => $this->faker->randomElement(['Running', 'Not Running']),
            'water_production' => $this->faker->word,
            'free_residual_chlorine' => $this->faker->word,
            'total_residual_chlorine' => $this->faker->word,
            'combined_residual_chlorine' => $this->faker->word,
            'test_time' => $this->faker->time,
            'test_date' => $this->faker->date,
            'test_month' => $this->faker->date,
            'test_year' => $this->faker->date,
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
