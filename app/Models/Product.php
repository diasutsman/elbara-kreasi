<?php

namespace App\Models;

use App\Events\DeletedItem;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Sluggable;

    public $with = ['category'];

    protected $casts = [
        'is_best_seller' => 'boolean',
    ];

    protected $guarded = ['id',];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'deleted' => DeletedItem::class,
    ];

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

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['query'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search  . '%')
                ->orWhere('description', 'like', '%' . $search  . '%')
                ->orWhere('additional_information', 'like', '%' . $search  . '%')
                ->orWhere('price', 'like', '%' . $search  . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->whereHas(
                'category',
                fn ($query) =>
                $query->where('slug', $category)
            );
        });
    }
}
