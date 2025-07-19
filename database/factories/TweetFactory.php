<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Tweet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tweet>
 */
class TweetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'user_id' => User::inRandomOrder()->first(),
            'user_id' => User::inRandomOrder()->find(5),
            'body' => fake()->text()
        ];
    }
}
