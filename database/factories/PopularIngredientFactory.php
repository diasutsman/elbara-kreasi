<?php

namespace Database\Factories;

use App\Models\PopularIngredient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Cviebrock\EloquentSluggable\Services\SlugService;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PopularIngredient>
 */
class PopularIngredientFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    $name = collect(['Laminasi Doff', 'Laminasi Glossy'])->random();
    return [
      'name' => $name,
      'slug' => SlugService::createSlug(PopularIngredient::class, 'slug', $name),
    ];
  }
}
