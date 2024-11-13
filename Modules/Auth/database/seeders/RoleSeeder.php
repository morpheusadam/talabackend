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
            ['role_name' => 'admin', 'description' => 'Administrator with full access'],
            ['role_name' => 'client', 'description' => 'Administrator with full access'],
            ['role_name' => 'vendor', 'description' => 'Administrator with full access'],

        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
