<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'admin', 'description' => 'Administrator with full access'],
            ['name' => 'vendor', 'description' => 'Vendor with specific access'],
            ['name' => 'client', 'description' => 'Client with limited access'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}