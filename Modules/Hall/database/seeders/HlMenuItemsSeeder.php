<?php

namespace Modules\Hall\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HlMenuItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Assuming you have some menus already seeded
        $menuIds = DB::table('hl_menus')->pluck('id')->toArray();

        foreach (range(1, 10) as $index) {
            DB::table('hl_menu_items')->insert([
                'menu_id' => $faker->randomElement($menuIds),
                'type' => $faker->randomElement(['food', 'drink', 'appetizer', 'dessert', 'soup']),
                'name' => $faker->word . ' Item',
                'price' => $faker->randomFloat(2, 5, 100),
                'description' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}