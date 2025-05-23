<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TiketGangguan>
 */
class TiketGangguanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_tiket' => $this->faker->unique()->numerify('IN-####'),
            'headline' => $this->faker->sentence(),
            'deskripsi' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['open', 'in_progress', 'closed']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
