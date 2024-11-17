<?php

namespace Modules\Hall\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HlHallEventTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Assuming you have some halls and event types already seeded
        $hallIds = DB::table('hl_halls')->pluck('id')->toArray();
        $eventTypeIds = DB::table('hl_event_types')->pluck('id')->toArray();

        $combinations = [];

        foreach (range(1, 10) as $index) {
            $hallId = $faker->randomElement($hallIds);
            $eventTypeId = $faker->randomElement($eventTypeIds);

            // Ensure the combination is unique
            while (in_array([$hallId, $eventTypeId], $combinations)) {
                $hallId = $faker->randomElement($hallIds);
                $eventTypeId = $faker->randomElement($eventTypeIds);
            }

            $combinations[] = [$hallId, $eventTypeId];

            DB::table('hl_hall_event_types')->insert([
                'hall_id' => $hallId,
                'event_type_id' => $eventTypeId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}