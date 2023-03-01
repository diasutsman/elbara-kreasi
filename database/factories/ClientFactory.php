<?php

namespace Database\Factories;

use App\Models\Client;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    $name = $this->faker->company();
    return [
      'name' => $name,
      'link' => $this->faker->url(),
      'slug' => SlugService::createSlug(Client::class, 'slug', $name),
    ];
  }
}
