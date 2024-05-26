<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Corporation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobHuntingStatus>
 */
class JobHuntingStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'corporation_id' => Corporation::factory(),
            'user_id' => User::factory(),
            'priority' => $this->faker->numberBetween(1, 20),
            'way_id' => $this->faker->randomDigit(),
            'note' => $this->faker->realText($maxNbChars = 35),
            'status_id' => $this->faker->randomDigit(),
            'submit' => now(),
            'interview1' => now(),
            'interview2' => now(),
            'interview_last' => now(),
        ];
    }
}
