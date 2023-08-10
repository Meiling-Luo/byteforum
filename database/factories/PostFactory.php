<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(5), //add five words for the title
            'content' => $this->faker->paragraph(5), //add five sentence for the paragraph
            'user_id' => $this->faker->numberBetween(1, 10) //create 10 users and the user id will between 1-10.
        ];
    }
}
