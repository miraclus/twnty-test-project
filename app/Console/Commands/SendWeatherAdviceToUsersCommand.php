<?php

namespace App\Console\Commands;

use App\Events\SendWeatherAdviceEvent;
use Illuminate\Console\Command;

class SendWeatherAdviceToUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:send-weather-advice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send weather advice to users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        event(new SendWeatherAdviceEvent());
    }
}
