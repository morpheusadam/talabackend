<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\Models\Permission; // Ensure this line is present and correct

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['permission_name' => 'view_users', 'description' => 'Permission to view users'],
            ['permission_name' => 'edit_users', 'description' => 'Permission to edit users'],
            ['permission_name' => 'delete_users', 'description' => 'Permission to delete users'],
            // Add more permissions as needed
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
