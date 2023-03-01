<?php

namespace Database\Factories;

use App\Models\FinishingOption;
use Illuminate\Database\Eloquent\Factories\Factory;
use Cviebrock\EloquentSluggable\Services\SlugService;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FinishingOption>
 */
class FinishingOptionFactory extends Factory
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
      'name' => $name,
      'slug' => SlugService::createSlug(FinishingOption::class, 'slug', $name),
    ];
  }
}
