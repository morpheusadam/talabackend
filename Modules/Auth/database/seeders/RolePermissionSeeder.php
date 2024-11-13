<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\Models\Role; // Ensure this line is present and correct
use Modules\Auth\Models\Permission; // Ensure this line is present if Permission is used

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('role_name', 'admin')->first();
        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            $role->permissions()->attach($permission->id);
        }
    }
}
