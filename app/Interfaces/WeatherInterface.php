<?php

declare(strict_types=1);

namespace App\Interfaces;

interface WeatherInterface
{
    public function update(): void;
}
