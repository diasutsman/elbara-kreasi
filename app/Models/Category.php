<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
  use HasFactory, Sluggable;

  protected $guarded = ['id'];

  public function products()
  {
    return $this->hasMany(Product::class);
  }

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'name'
      ]
    ];
  }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
