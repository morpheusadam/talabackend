<?php

namespace Modules\Hall\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HlReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Assuming you have some customers and halls already seeded
        $customerIds = DB::table('hl_customers')->pluck('id')->toArray();
        $hallIds = DB::table('hl_halls')->pluck('id')->toArray();

        foreach (range(1, 10) as $index) {
            DB::table('hl_reservations')->insert([
                'customer_id' => $faker->randomElement($customerIds),
                'hall_id' => $faker->randomElement($hallIds),
                'date' => $faker->dateTimeBetween('now', '+1 year'),
                'status' => $faker->randomElement(['reserved', 'available']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}