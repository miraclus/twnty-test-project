<?php

declare(strict_types=1);

namespace App\Services\Weaher;

use App\Interfaces\WeatherInterface;
use App\Models\Country;
use App\Models\Employee;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Openweathermap implements WeatherInterface
{
    private ?array $config;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->config = config('weather.openweathermap');
        if ($this->config === null) {
            throw new Exception('Weather config not found');
        }
    }

    function update(): void
    {
        $countriesId = Employee::groupBy('country_id')->pluck('country_id');
        $countries = Country::whereIn('id', $countriesId)->get();
        foreach ($countries as $country) {
            $weather = $this->getWeather($country->latitude, $country->longitude);
            if ($weather === null) {
                Log::error("Update weather error: " . print_r($country->name, true));
                continue;
            }
            foreach ($weather as $kay => $value) {
                $country->weather()->updateOrCreate(
                    ['date' => now()->toDateString()], [
                        'main' => $value['main'],
                        'description' => $value['description'],
                    ]
                );
            }
        }
    }

    /**
     * @throws Exception
     */
    private function getWeather(float $countryLattitude, float $countryLongitude): array|Exception|null
    {
        try {
            $response = Http::get($this->config['url'], [
                'lat' => $countryLattitude,
                'lon' => $countryLongitude,
                'appid' => $this->config['api_key'],
            ]);
        } catch (Exception $e) {
            Log::error("Update weather error: " . print_r($e->getMessage(), true));
        }

        $result = json_decode($response->body(), true);
        return $result['daily'][0]['weather'] ?? null;
    }
}
