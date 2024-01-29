<?php

namespace docker;

use App\Events\SendWeatherAdviceEvent;
use App\Mail\WeatherAdviceMail;
use App\Models\Employee;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendWeatherAdviceEmailListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendWeatherAdviceEvent $event): void
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
