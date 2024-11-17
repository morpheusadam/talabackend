<?php

namespace Modules\Hall\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HlHallsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Assuming you have some companies already seeded
        $companyIds = DB::table('hl_companies')->pluck('id')->toArray();

        foreach (range(1, 10) as $index) {
            DB::table('hl_halls')->insert([
                'company_id' => $faker->randomElement($companyIds),
                'name' => $faker->word . ' Hall',
                'capacity' => $faker->numberBetween(50, 500),
                'description' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}