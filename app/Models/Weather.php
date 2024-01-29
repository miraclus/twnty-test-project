<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $country_id
 * @property string $description
 * @property string $advice
 * @property string $date
 */
class Weather extends Model
{
    use HasFactory;

    protected $table = 'weathers';
    protected $fillable = [
        'country_id',
        'main',
        'description',
        'date',
    ];
}
