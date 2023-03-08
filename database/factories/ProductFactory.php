<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Cviebrock\EloquentSluggable\Services\SlugService;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    $name = $this->faker->words(2, true);
    return [
      'category_id' => Category::all()->random()->id,
      'name' => $name,
      'slug' => SlugService::createSlug(Product::class, 'slug', $name),
      'description' => collect($this->faker->paragraphs(mt_rand(1, 3)))
      ->map(fn ($p) => '<p>' . $p . '</p>')->join(''),
      'is_best_seller' => $this->faker->boolean(70),
      'additional_information' => collect($this->faker->paragraphs(mt_rand(5, 10)))
      ->map(fn ($p) => '<p>' . $p . '</p>')->join(''),
    ];
  }
}
