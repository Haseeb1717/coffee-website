<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Coffee extends Model
{
    protected $fillable = [
        'name',
        'name_ar',       
        'description',
        'description_ar',
       'category',
        'category_ar',       
        'roast_type',
        'cup_size',
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
public function getLocalizedNameAttribute()
{
    return app()->getLocale() === 'ar' && $this->name_ar
        ? $this->name_ar
        : $this->name;
}

public function getLocalizedDescriptionAttribute()
{
    return app()->getLocale() === 'ar' && $this->description_ar
        ? $this->description_ar
        : $this->description;
}

public function getLocalizedCategoryAttribute()
{
    return app()->getLocale() === 'ar' && $this->category_ar
        ? $this->category_ar
        : $this->category;
}
    }

