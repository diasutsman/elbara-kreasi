<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Sluggable, Searchable;

    public $with = ['category'];

    protected $casts = [
        'is_best_seller' => 'boolean',
    ];

    protected $guarded = ['id',];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
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
