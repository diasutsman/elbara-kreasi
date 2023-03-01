<?php

namespace Database\Factories;

use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;
use Cviebrock\EloquentSluggable\Services\SlugService;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Size>
 */
class SizeFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    $name = collect(['A4', 'A5', '9,5x11 Inch'])->random();
    return [
      'name' => $name,
      'slug' => SlugService::createSlug(Size::class, 'slug', $name),
    ];
  }
}
