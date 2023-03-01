<?php

namespace Database\Factories;

use App\Models\ColorOption;
use Illuminate\Database\Eloquent\Factories\Factory;
use Cviebrock\EloquentSluggable\Services\SlugService;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ColorOption>
 */
class ColorOptionFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    $name = rand(0, 1) ? rand(1,4) . ' warna' : 'full color';
    return [
      'name' => $name,
      'slug' => SlugService::createSlug(ColorOption::class, 'slug', $name),
    ];
  }
}
