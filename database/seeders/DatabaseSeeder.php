<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\EmployeeFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @throws \Exception
     */
    public function run(): void
    {
        DB::beginTransaction();
        try{
            $this->call([
                CountriesTableSeeder::class,
                WeatherAdviceTableSeeder::class
            ]);
            EmployeeFactory::new()->count(500)->create();
            DB::commit();
        }catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

    }
}
