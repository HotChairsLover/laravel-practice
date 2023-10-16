<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdvPost>
 */
class AdvPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(rand(3, 8), true);
        $txt = fake()->realText(rand(1000, 4000));
        $isPublished = rand(1, 5) > 1;

        $created_at = fake()->dateTimeBetween('-3 months', '-2 months');

        $data = [
            'category_id' => rand(1, 11),
            'user_id' => (rand(1, 5) == 5) ? 1 : 2,
            'title' => $title,
            'slug' => Str::slug($title),
            'price' => rand(100, 999999999),
            'description' => $txt,
            'is_published' => $isPublished,
            'published_at' => $isPublished ? fake()->dateTimeBetween('-2 months', '-1 days') : null,
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
        return $data;
    }
}
