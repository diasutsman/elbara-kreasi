<?php
namespace App\Traits;

use Illuminate\Support\Facades\Request;

trait GetImage {
    public function getImageAttribute($value)
    {
        return $value ? (Request::is('admin/*') ? asset('storage/' . $value) : $value) : null;
    }
}