<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    protected $casts = [
        'invoice_date' => 'datetime:Y-m-d',
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'description'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
