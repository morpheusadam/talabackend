<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\Models\UserMeta; // Ensure this line is present and correct

class UserMetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userMetas = [
            ['user_id' => 1, 'meta_key' => 'theme', 'meta_value' => 'dark'],
            // Add more user meta entries as needed
        ];

        foreach ($userMetas as $meta) {
            UserMeta::create($meta);
        }
    }
}
