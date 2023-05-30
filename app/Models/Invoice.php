<?php

namespace App\Models;

use App\Models\InvoiceItem;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    protected $casts = [
        'due_on' => 'datetime:Y-m-d',
        'issued_on' => 'datetime:Y-m-d',
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    public function invoice_items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'bill_title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
