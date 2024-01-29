<?php

namespace Database\Seeders;

use App\Models\WeatherAdvice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherAdviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Частина 1
        $advices = [
            'thunderstorm with light rain' => 'Keep a raincoat handy for sudden showers.',
            'thunderstorm with rain' => 'A good day to enjoy the sound of rain indoors.',
            'thunderstorm with heavy rain' => 'Perfect time for a cup of tea and a book.',
            'light thunderstorm' => 'A mild thunderstorm, but better stay inside.',
            'thunderstorm' => 'Charge your devices in case of a power outage.',
            'heavy thunderstorm' => 'Stay safe indoors and avoid electrical appliances.',
            'ragged thunderstorm' => 'Expect unpredictable weather conditions.',
            'thunderstorm with light drizzle' => 'A mix of thunder and light rain, take care.',
            'thunderstorm with drizzle' => 'The gentle rain complements the thunder.',
            'thunderstorm with heavy drizzle' => 'Heavy drizzle with thunder might affect visibility.',

            'light intensity drizzle' => 'Light drizzle, an umbrella might not be necessary.',
            'drizzle' => 'A light jacket should be enough for this drizzle.',
            'heavy intensity drizzle' => 'Expect wet conditions, carry an umbrella.',
            'light intensity drizzle rain' => 'Light drizzle rain, a pleasant weather for a walk.',
            'drizzle rain' => 'Perfect weather for enjoying a warm drink indoors.',
            'heavy intensity drizzle rain' => 'The heavy drizzle may affect your outdoor plans.',
            'shower rain and drizzle' => 'Intermittent rain and drizzle, keep an umbrella close.',
            'heavy shower rain and drizzle' => 'Heavy showers and drizzle, a waterproof coat is advised.',
            'shower drizzle' => 'Occasional drizzle, a light raincoat will do.',

            'light rain' => 'Light rain, a pleasant weather to enjoy the outdoors.',
            'moderate rain' => 'Moderate rain, might want to carry an umbrella.',
            'heavy intensity rain' => 'Heavy rain, good for staying in and relaxing.',
            'very heavy rain' => 'Very heavy rain, best to avoid going out.',
            'extreme rain' => 'Extreme rain conditions, stay safe indoors.',
            'freezing rain' => 'Beware of icy conditions due to freezing rain.',
            'light intensity shower rain' => 'Light showers, a peaceful weather.',
            'shower rain' => 'Regular shower rain, a common sight.',
            'heavy intensity shower rain' => 'Heavy shower rain, be cautious while driving.',
            'ragged shower rain' => 'Ragged shower rain, expect sudden changes in weather.',

            'light snow' => 'Light snowfall, enjoy the gentle snow dance.',
            'snow' => 'Time to bring out the snow boots.',
            'heavy snow' => 'Heavy snowfall, be prepared for shoveling.',
            'sleet' => 'Sleet can be slippery, walk carefully.',
            'light shower sleet' => 'Light sleet showers, a mix of rain and snow.',
            'shower sleet' => 'Sleet showers, keep warm and dry.',
            'light rain and snow' => 'Light rain mixed with snow, dress in layers.',
            'rain and snow' => 'Rain and snow, a slippery combination.',
            'light shower snow' => 'Light snow showers, a beautiful sight.',
            'shower snow' => 'Snow showers might make travel difficult.',
            'heavy shower snow' => 'Heavy snow showers, consider staying indoors.',

            'mist' => 'Misty conditions, be cautious while driving.',
            'smoke' => 'Smoke may reduce visibility, be careful.',
            'haze' => 'Hazy weather, might affect outdoor activities.',
            'sand/dust whirls' => 'Sand and dust whirls, protect your eyes and face.',
            'fog' => 'Foggy conditions, drive with lights on.',
            'sand' => 'Sandy conditions, better to stay inside.',
            'dust' => 'Dusty weather, keep windows closed.',
            'volcanic ash' => 'Volcanic ash in the air, wear a mask.',
            'squalls' => 'Squalls, expect sudden and strong winds.',
            'tornado' => 'Tornado alert, seek shelter immediately.',

            'clear sky' => 'Clear skies, perfect for stargazing.',
            'few clouds' => 'Just a few clouds, a lovely day.',
            'scattered clouds' => 'Scattered clouds, great for outdoor photography.',
            'broken clouds' => 'Broken clouds, a little sun and a little shade.',
            'overcast clouds' => 'Overcast skies, a cozy day indoors.',
            'few clouds: 11-25%' => 'A few clouds in the sky, a bright day ahead.',
            'scattered clouds: 25-50%' => 'Scattered clouds might bring a pleasant surprise.',
            'broken clouds: 51-84%' => 'Broken clouds, a bit of sun peeking through.',
            'overcast clouds: 85-100%' => 'Overcast skies, might be a good day for indoor activities.'
        ];

        foreach ($advices as $description => $advice) {
            WeatherAdvice::updateOrCreate(
                ['weather_description' => $description],
                ['advice' => $advice]
            );
        }

    }
}
