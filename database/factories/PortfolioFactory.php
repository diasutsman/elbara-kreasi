<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Client;
use App\Models\Portfolio;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Cviebrock\EloquentSluggable\Services\SlugService;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portfolio>
 */
class PortfolioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->words(2, true);

        return [
            'title' => $title,
            'slug' => SlugService::createSlug(Portfolio::class, 'slug', $title),
            'product_id' => Product::all()->random()->id,
            'client' => $this->faker->company(),
        ];
    }
}
