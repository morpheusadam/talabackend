<?php

namespace Modules\Hall\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HlFacilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Assuming you have some halls already seeded and you want to assign facilities to them
        $hallIds = DB::table('hl_halls')->pluck('id')->toArray();

        foreach (range(1, 10) as $index) {
            DB::table('hl_facilities')->insert([
                'hall_id' => $faker->randomElement($hallIds),
                'name' => $faker->word,
                'description' => $faker->sentence,
                'image_url' => $faker->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}