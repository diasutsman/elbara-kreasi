<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Client;
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
          'client_id' => Client::all()->random()->id,
          'slug' => SlugService::createSlug(Category::class, 'slug', $title),
          'image' => $this->faker->imageUrl(640, 480, 'cats', true),
      ];
    }
}
