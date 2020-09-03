<?php
// use .\factories\WaterLevelFactory;
// use App\Database\Factories\WaterLevelFactory;
// use App\WaterLevelFactory;
use App\WaterLevel;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $time_start = microtime(true);

        // $this->call(RandomWaterLevelSeeder::class);
        factory(WaterLevel::class, 50000)->create();
        $time_end = microtime(true);
        $time_cost = $time_end - $time_start;
        Log::info($time_cost);
        // echo ('Spent: ', $time_cost);
    }
}
