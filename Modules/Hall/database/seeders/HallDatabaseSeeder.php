<?php

namespace Modules\Hall\Database\Seeders;

use Illuminate\Database\Seeder;

class HallDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            HlCompaniesSeeder::class,
            HlHallsSeeder::class,
            HlOptionsSeeder::class,
            HlFacilitiesSeeder::class,
            HlMenusSeeder::class,
            HlMenuItemsSeeder::class,
        //    HlCustomersSeeder::class,
            HlReservationsSeeder::class,
            HlEventTypesSeeder::class,
            HlHallEventTypesSeeder::class,
            HlHallSessionsSeeder::class,
        ]);
    }
}