<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $catogory_name = $this->faker->unique()->words($nb=2, $asText = true);
        $slug = Str::slug($catogory_name, '-');
        return [
            'name' => $catogory_name,
            'slug' => $slug
        ];
    }
}
