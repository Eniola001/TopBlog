<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['Lifestyle and Health', 'Arts & Culture', 'Technology', 'Business and Finance', 'Faith & Spirituality', 'Sports and Fitness', 'Education', 'Entertainment', 'Career & Professional Development'];
        
        return [
            'name' => $this->faker->unique()->randomElement($categories),
        ];
    }
}

