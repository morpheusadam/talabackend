<?php

namespace Modules\Hall\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HlOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Assuming you have some halls already seeded
        $hallIds = DB::table('hl_halls')->pluck('id')->toArray();

        foreach (range(1, 10) as $index) {
            DB::table('hl_options')->insert([
                'hall_id' => $faker->randomElement($hallIds),
                'name' => $faker->word . ' Option',
                'description' => $faker->sentence,
                'image_url' => $faker->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}