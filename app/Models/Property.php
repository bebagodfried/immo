<?php

namespace App\Models;

use Faker\Provider\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'surface',
        'rooms',
        'bedrooms',
        'floor',
        'price',
        'city',
        'address',
        'postal_code',
        'sold',
    ];

    public function getSlug(): string
    {
        return Str::slug($this->title);
    }

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }

//    public function images(): HasMany
//    {
//        return $this->hasMany(Image::class);
//    }
}
