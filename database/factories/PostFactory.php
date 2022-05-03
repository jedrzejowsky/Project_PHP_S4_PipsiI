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
    public function definition()
    {
        return [
            'title'=> $this->faker->sentence(),
            'content'=> $this->faker->paragraph(8),
            'date'=> $this->faker->dateTimeBetween('-5 days',now(),null),
            'author'=> $this->faker->firstName,
            'image'=> $this->faker->imageUrl(750,422)
        ];
    }
}
