<?php

namespace App\Models;

use App\Models\Product;
use App\Traits\GetImage;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory, Sluggable, GetImage;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getImageAttribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }
}
