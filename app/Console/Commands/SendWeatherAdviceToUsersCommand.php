<?php

namespace App\Console\Commands;

use App\Mail\WeatherAdviceMail;
use App\Models\Employee;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

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
        $employees = Employee::with('country.weatherAdvice')->get();

        foreach ($employees as $employee) {
            if ($employee->country && $employee->weatherAdvice) {
                $advices = $employee->weatherAdvice;
                $advicesForEmail = '';
                foreach ($advices as $advice) {
                    $advicesForEmail .= $advice->advice . "\n";
                }
                Mail::to($employee->email)->send(new WeatherAdviceMail($advicesForEmail));
            }
        }
    }
}
