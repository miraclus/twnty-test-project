<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @property integer $id
 * @property string $name
 * @property integer $age
 * @property integer $country_id
 * @property string $email
 * @property float $salary
 * @property string $position
 * @property string $created_at
 * @property string $updated_at
 */
class Employee extends Model
{
    use HasFactory;

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function weatherAdvice(): HasManyThrough
    {
        return $this->hasManyThrough(WeatherAdvice::class, Weather::class, 'country_id', 'id', 'country_id', 'id');
    }
}
