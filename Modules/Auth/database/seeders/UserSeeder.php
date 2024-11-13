<?php

namespace Modules\Auth\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1707489'),
            'company_name' => $faker->company,
            'website' => $faker->url,
            'address' => $faker->address,
            'logo' => $faker->imageUrl(100, 100, 'business', true, 'Faker'),
            'is_active' => true,
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Vendor User',
            'email' => 'vendor@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1707489'),
            'company_name' => $faker->company,
            'website' => $faker->url,
            'address' => $faker->address,
            'logo' => $faker->imageUrl(100, 100, 'business', true, 'Faker'),
            'is_active' => true,
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Client User',
            'email' => 'client@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1707489'),
            'company_name' => $faker->company,
            'website' => $faker->url,
            'address' => $faker->address,
            'logo' => $faker->imageUrl(100, 100, 'business', true, 'Faker'),
            'is_active' => true,
            'remember_token' => Str::random(10),
        ]);
        // Create additional users as needed
    }
}
