<?php

namespace App\Console\Commands;

use App\Interfaces\WeatherInterface;
use Illuminate\Console\Command;

class UpdateWeatherCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update weather command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Start updating weather...');

        $weatherService = app(WeatherInterface::class);
        $weatherService->update();

        $this->info('Weather updated successfully!');
    }
}
