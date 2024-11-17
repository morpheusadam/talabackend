<?php

namespace Modules\Auth\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Modules\Auth\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Fetch roles
        $adminRole = Role::where('name', 'admin')->first();
        $vendorRole = Role::where('name', 'vendor')->first();
        $clientRole = Role::where('name', 'client')->first();

        if (!$adminRole || !$vendorRole || !$clientRole) {
            throw new \Exception('Required roles are missing. Please run the RoleSeeder first.');
        }

        // Create users
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role_id' => $adminRole->id,
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
            'password' => Hash::make('password123'),
            'role_id' => $vendorRole->id,
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
            'password' => Hash::make('password123'),
            'role_id' => $clientRole->id,
            'company_name' => $faker->company,
            'website' => $faker->url,
            'address' => $faker->address,
            'logo' => $faker->imageUrl(100, 100, 'business', true, 'Faker'),
            'is_active' => true,
            'remember_token' => Str::random(10),
        ]);
    }
}