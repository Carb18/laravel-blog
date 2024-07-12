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
        // CONTROL DE PUBLISHED
        $published = $this->faker->randomElement([true, false]);
        $published_at = $published ? $this->faker->dateTimeBetween('-1 years', 'now') : null;
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->text(200),
            'body' => $this->faker->paragraph(),
            'image_path' => $this->faker->imageUrl(1280, 720),
            'published' => $published,
            'category_id' => rand(1, 20),
            'user_id' => rand(1, 20),
            'published_at' => $published_at,
        ];
    }
}
