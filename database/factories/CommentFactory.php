<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->paragraph(5), //add five sentence for the comment paragraph
            'user_id' => $this->faker->numberBetween(1, 20), //create 10 users and the user id will between 1-10.
            'post_id' => $this->faker->numberBetween(1, 20),

        ];
    }
}
