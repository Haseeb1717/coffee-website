<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Coffee extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category',
        'roast_type',
        'price',
        'image_url',
        'is_available',
        'is_featured',
        'is_customizable',
    ];

    public function getImageUrlAttribute($value): ?string
    {
        if (empty($value)) {
            return null;
        }

        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }

        return Storage::disk('public')->url($value);
    }
}
