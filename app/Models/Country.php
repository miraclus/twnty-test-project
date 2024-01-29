<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $weather_description
 * @property string $advice
 */
class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'weather_description',
        'advice',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public function weather(): HasMany
    {
        return $this->hasMany(Weather::class);
    }
}
